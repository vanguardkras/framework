<?php

namespace App\Controllers;

use App\About;
use App\Blog;
use App\Orders;
use App\Products;
use Service\GeoIP;
use Service\Mail;
use Service\Purchase;
use Service\YandexMoney;


/**
 * Main Controller for your main pages.
 *
 * @author Max Shaian
 */

class MainController extends Controller
{
    /**
     * about page
     * 
     * @return type
     */
    public function about()
    {
        $about = (new About)->get();
        
        return $this->view('about', [
                    'about' => $about,
                    'title' => 'About me',
        ]);
    }
    
    /**
     * Particular blog page.
     * 
     * @param array $id
     */
    public function blog(array $id)
    {
        $id = $id[0];
        
        $data = (new Blog)->getByID($id);
        
        return $this->view('blog', [
            'data' => $data,
            'title' => $data['header'],
        ]);
    }
    
    /**
     * Blog page.
     */
    public function blogs()
    {
        $blog = new Blog;
        $list = $blog->getAllForPage();
        $total = $blog->count();
        
        $paginator = self::paginator($total);
                
        return $this->view('blogs', [
            'list' => $list,
            'title' => 'Blog',
            'paginator' => $paginator,
        ]);
    }
    
    /**
     * Actions after downloading a particular product.
     * 
     * @param array $product_id
     */
    public function downloaded(array $product_id)
    {
        $id = $product_id[0];
        
        $download_link = (new Products)->downloaded($id);
        
        $message = substr($download_link, 9);
        $message .= ' has been downloaded!<br>';
        
        if ($geo = GeoIP::get()) {
            $message .= 'IP: '.$geo['ip'].'<br>';
            $message .= 'Country: '.$geo['country'].'<br>';
            $message .= 'Region: '.$geo['region'].'<br>';
            $message .= 'City: '.$geo['city'].'<br>';
        }
        
        (new Mail)->sendNotification($message);
        
        header('Location: '. $download_link);
    }
    
    /**
     * downloads page
     * 
     */
    public function downloads()
    {
        $downloads = (new Products)->getDownloads();
        
        return $this->view('download', [
                    'downloads' => $downloads,
                    'title' => 'Downloads',
        ]);
    }
    
    /**
     * Main page.
     */
    public function main()
    {
        $array = json_encode($_POST, JSON_PRETTY_PRINT);
        file_put_contents('yandex.txt', $array);
        
        $products = (new Products)->getAll();
        
        return $this->view('main_page', [
                    'products' => $products,
                    'title' => 'Web Applications for your business',
        ]);
    }
    
    
    /**
     * Method for processing orders.
     */
    public function order()
    {
        $purchase = new \Service\Purchase;
        
        if ($purchase->check()) {
            $purchase->sendEmail();
        }
    }
    
    /**
     * Product purchase page
     * 
     * @param type $product_id
     */
    public function purchase($product)
    {
        $product_id = $product[0];
        
        $data = (new Orders)->getByProductId($product_id);
        
        //debug($data);
        
        array_walk($data, function(&$value) {
            $yandex = new YandexMoney();
            $yandex->needEmail();
            $yandex->setTargets($value['name']);
            $yandex->setLabel($value['name']);
            $value['form'] = $yandex->purchaseForm($yandex->USDtoRub($value['price']));
        });
        
        $this->view('order', ['data' => $data]);
    }
}
