
<?php
        // akbar123#(akb@gmail.com)

session_start();
class allFunction{
    
    private $server = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = 'er';
        private $conn;
        public function __construct()
        {
            $conn = mysqli_connect($this->server,$this->user,$this->password,$this->database);

            if (!$conn)
            {
                die ("<h1>Database Connection Failed</h1>". mysqli_connect_error());
            }
            return $this->conn = $conn;
        }

    public function homepage_products(){

        // $stmt = "SELECT p.id, p.p_name,p.p_price,p.p_desc,b.b_name,pc.c_name,GROUP_CONCAT(pi.image_url) imagesUrls FROM `products` p JOIN brands b ON b.id=p.brand_id JOIN product_catagory pc ON pc.id=p.p_catagory_id JOIN product_images pi ON pi.p_id=p.id GROUP BY p.id ORDER BY RAND() LIMIT 9";

        $stmt = "SELECT p.id, p.p_name,p.p_price,GROUP_CONCAT(pi.image_url) imagesUrls FROM `products` p JOIN product_images pi ON pi.p_id=p.id GROUP BY p.id ORDER BY RAND() LIMIT 9";
        $result = mysqli_query($this->conn,$stmt);
        $num = mysqli_num_rows($result);
        if($num>0)
        {
            $str = '';
            while($row = mysqli_fetch_assoc($result))
            {   
                $p_name = substr($row['p_name'],0,15);
                $imgArr = explode(',',$row['imagesUrls']);    
                $str .= '<div class="col-sm-6 col-md-3 col-lg-3">
                <div class="box section">
                    <div class="img-box">
                        <img src="images/product-images/'.$imgArr[0].'" alt="">
                    </div>
                    <div class="options p-2">
                        <div class="p-name">
                            <h5>'.$p_name.'...</h5>
                        </div>
                        <div class="p-price">
                            <h4>₹'.$row['p_price'].'</h4>
                            <a href="product_detail.php?p_id='.$row['id'].'" class="option1">
                            View
                        </a> 
                        </div>
                                                   
                    </div>                    
                </div>
            </div>';   
            }
        }
        else {
            $str = 'Product Not Found';
        }
        return $str;
    }

    public function login($post){
        $email = $post['email'];
        $password = $post['password'];
        $stmt = "select * from users where email = '$email'";
        $result = mysqli_query($this->conn,$stmt);
        $row = mysqli_num_rows($result);
        if($row==1){
            $num = mysqli_fetch_assoc($result);
            if(password_verify($password,$num['password']))
            {   
                // session_start();
                $_SESSION['user_id'] = $num['id'];
                $_SESSION['user_name'] = $num['full_name'];
                $_SESSION['user_email'] = $num['email'];
                header('location:index.php');
            }
            else {
                return '<div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>Invalid Password
                        </div>';
            }
        }
        else {
            return '<div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>Invalid Credential
                        </div>';
        }
        
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('location:../index.php');
    }

    public function signup($post){
        $fullName = $post['fname'];
        $email = $post['email'];
        $password = $post['password'];
        $cpassword = $post['cpassword'];
        $stmt = "select * from users where email = '$email'";
        $result = mysqli_query($this->conn,$stmt);
        $row = mysqli_num_rows($result);
        if($row>=1)
        {
            return '<div class="alert alert-danger" role="alert">
                        <strong>Error! </strong>User already exist
                    </div>';
        }
        else{
            // return strlen($fullName);
            if(strlen($fullName) == 0 || strlen($email) == 0 || strlen($password) == 0)
            {
                return '<div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Error! </strong>Fill all fields.
                            <button class="close">*</button>
                        </div>';                
            }
            else{
                if($password == $cpassword)
                {   
                    $passHash = password_hash($password,PASSWORD_DEFAULT);
                    $stmt = "INSERT INTO users (full_name,email,password) values ('$fullName','$email','$passHash')";
                    $result = mysqli_query($this->conn,$stmt);
                    $stmt = "SELECT * FROM users where email=$email";
                    $results = mysqli_query($this->conn,$stmt);
                    $row  = mysqli_fetch_assoc($results);
                    $id = $row['id'];
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $fullName;
                    $_SESSION['user_email'] = $email;
                    header('location:index.php');
                }
                else{
                    return '<div class="alert alert-danger" role="alert">
                                <strong>Error! </strong>Password are not same.
                            </div>';
                }
            }
        }
    }

    public function list_orders($id) {
        
        $stmt = "SELECT o.p_id,u.full_name,u.email,p.p_name,p.p_price,o.order_date,o.mobile_no,o.billing_address,GROUP_CONCAT(pi.image_url) img FROM orders o JOIN users u ON $id = o.user_id JOIN product_images pi ON pi.p_id = o.p_id JOIN products p ON p.id=o.p_id GROUP BY o.id DESC";

        $result = mysqli_query($this->conn,$stmt);
        $num = mysqli_num_rows($result);
        $str = '';
        if($num>0)
        {
            $i=1;
            while($row = mysqli_fetch_assoc($result))
            {
                $p_name = substr($row['p_name'],0,20);
                $addressArr = explode('|',$row['billing_address']);
                $imgArr = explode(',',$row['img']);    

                $str .= '<div class="row ml-5 mx-5 px-5 ">
                <div class="col-8">
                <a href="product_detail.php?p_id='.$row['p_id'].'">
                    <div class="row o-list p-1">
                        <div class="col-3 px-3 p-0">
                            <img src="images/product-images/'.$imgArr[0].'" class="p_img" alt="">
                        </div>
                        <div class="col-3 ml-n4">
                            <p>'.$p_name.'...</p>
                            <h4>₹'.$row['p_price'].'</h4>
                        </div>
                        <div class="col-3">
                            <h4>Address</h4>
                            <p style="text-wrap:wrap; width:100%;">'.$addressArr[0].'<br>'.$addressArr[1].'</p>
                        </div>
                    </div></a>
                </div>
            </div>';
                $i++;
            }
        }
        else{
            return $str .= '<div class="alert alert-danger" role="alert">
            <strong>Error! </strong>No orders in orderlist.
            </div>';
        }
        return $str;
    }

    public function list_wish($id) {
        
        $stmt = "SELECT w.id wid,p.id,p.p_name,p.p_price,GROUP_CONCAT(pi.image_url) img FROM wishlist w
                JOIN product_images pi ON pi.p_id = w.p_id
                JOIN users u ON $id = w.user_id
                JOIN products p ON p.id=w.p_id GROUP BY w.id";
        $result = mysqli_query($this->conn,$stmt);
        $num = mysqli_num_rows($result);
        if($num>0)
        {
            $str = '';
            $i=1;
            while($row = mysqli_fetch_assoc($result))
            {
                $imgArr = explode(',',$row['img']);    
                $str .= '<tr style="border-bottom: 1px solid;">
                    <td style="width:100px;height:70px"><a href="product_detail.php?p_id='.$row['id'].'"><img src="images/product-images/'.$imgArr[1].'" style="border-radius:100%;width:100px;height:70px;padding:0px 10px;"></a></td>
                    <td>'.$row['p_name'].'</td>
                    <td>₹'.$row['p_price'].'</td>
                    <td><a href="config/allFunction.php?choice=2&w_id='.$row['wid'].'"><button class="btn btn-sm btn-danger ml-3">Delete</button></a></td>
                </tr>';
                $i++;
            }
        }
        else{
            return $str = '<div class="alert alert-danger" role="alert">
            <strong>Error! </strong>No item in wishlist.
            </div>';
        }
        return $str;
    }

    public function add_wishlist($post){
        $user_id = $_SESSION['user_id'];
        $p_id = $post;
        $stmt = "SELECT * FROM wishlist WHERE p_id =".$p_id;
        $result = mysqli_query($this->conn,$stmt);
        $num = mysqli_num_rows($result);
        if($num==0)
        {
            $stmt = "INSERT INTO wishlist (user_id,p_id) VALUES ($user_id,$p_id)";
            $results = mysqli_query($this->conn,$stmt);
            if ($results) {
                // header('location:wishlist.php');
                return $str = '<div class="alert alert-success" role="alert">
                            <strong>Success! </strong>Product added successfully.
                            </div>';
            }
            else{
                return $str = '<div class="alert alert-danger" role="alert">
                            <strong>Error! </strong>Data not inserted due to technical issue.
                            </div>';
            }
        }
        else {
            return $str = '<div class="alert alert-warning" role="alert">
                        <strong>Error! </strong>Already product in wishlist.
                        </div>';
            }
    }
    public function delete_wishlist($post){
        $stmt = "DELETE FROM wishlist WHERE id =".$post;
        $result = mysqli_query($this->conn,$stmt);
        header('location:../wishlist.php');
    }

    public function product_detail($post){

        $stmt = "SELECT p.id,b.b_name,p.p_name,p.p_price,p.p_desc,GROUP_CONCAT(pi.image_url) imageUrls FROM `products` p JOIN product_images pi ON pi.p_id = p.id JOIN brands b ON b.id = p.brand_id WHERE p.id = $post GROUP BY p.id";
        $result = mysqli_query($this->conn,$stmt);
        $num = mysqli_num_rows($result);
        if($num==1)
        {
            $str = '';
            $i=1;
            while($row = mysqli_fetch_assoc($result))
            {
                $imgArr = explode(',',$row['imageUrls']);   
                $str .= '<div class="row p-detail">
                <div class="image">
                    <img src="images/product-images/'.$imgArr[0].'" onclick="im1()" alt="" id="im1" id="main-img">
                </div>
                <div class="sm-images">
                    <img src="images/product-images/'.$imgArr[0].'" onclick="im1()" alt="" id="im1" class="sm-img">
                    <img src="images/product-images/'.$imgArr[1].'"  onclick="im2()" alt="" id="im2" class="sm-img">
                    <img src="images/product-images/'.$imgArr[2].'" onclick="im3()"  alt="" id="im3" class="sm-img">
                </div>
                <div class="content px-3">
                    <h1 class="m-0 mt-1">'.$row['b_name'].'</h1>
                    <p class="m-0">'.$row['p_name'].'</p>
                    <div class="rate">
                    <b><span>4.1 * </span></b><span>  | 2.8k Ratings</span>
                    </div>
                    <hr>
                    <div class="price">
                    <h3>₹'.$row['p_price'].'</h3> <span>MRP <s> ₹1499</s></span> <span> (20% OFF)</span>
                    </div>
                    <span class="green">inclusive of all taxes</span><br>
                    <h5 class="mt-1"><strong>Product Details:</strong></h5>
                    <div class="desc mt-1">
                        '.$row['p_desc'].'
                    </div>
                    <div class="o-w-btn mb-1">
                        <a href="buy.php?p_id='.$row['id'].'" class="btn-order">BUY</a>
                        <a href="wishlist.php?p_id='.$row['id'].'" class="btn-wish">WISHLIST</a>
                    </div>
                    </div>
                    </div>';

            }
        }
        else{
            return $str = '<div class="alert alert-danger" role="alert">
                <strong>Error! </strong>Product Not Found.
            </div>';
        }   
        return $str;
    }

    public function buy_details($post){
        $user_id = $_SESSION['user_id'];
        $stmt = "SELECT p.id p_id,u.full_name,u.email,u.password,p.p_name,p.p_price,p.p_desc,GROUP_CONCAT(pi.image_url) imageUrls FROM `products` p 
        JOIN users u on u.id = $user_id
        JOIN product_images pi ON pi.p_id = p.id WHERE p.id = $post GROUP BY p.id";
        $result = mysqli_query($this->conn,$stmt);
        $num = mysqli_num_rows($result);
        if($num==1)
        {
            $str = '';
            $i=1;
            while($row = mysqli_fetch_assoc($result))
            {
                $imgArr = explode(',',$row['imageUrls']);   
                $str .= '<div class="order-r">
                <h4 class=""><b>Order</b></h4>
                <div class="img">
                    <img src="images/product-images/'.$imgArr[0].'" alt="">
                </div>
                <h5 class="mt-2"><b>'.$row['p_name'].'</b></h5>
                <hr class="bg-pink">
                <div class="space-between mt-n2 mb-n2">
                    <p>Subtotal</p>
                    <p>₹'.$row['p_price'].'</p>
                </div>
                <div class="space-between mt-n2 mb-n2">
                    <p>Discount</p>
                    <p>₹00</p>
                </div>
                <div class="space-between mt-n2 mb-n2">
                    <p>Shipping</p>
                    <p>₹0</p>
                </div>
                <hr class="bg-pink m-0">
                <div class="space-between mt-1">
                    <p><b>Total</b></p>
                    <p><b>₹'.$row['p_price'].'</b></p>
                </div>
                
            </div>
            <div class="delivery ">
                <div class="ord-summary mt-3">
                    <h4><b>Order Summary</b></h4>
                        '.$row['p_desc'].'                    
                </div>
                
            </div>
            <div class="dil pl-4">
                <h4 class="mt-3 mb-4"><b>Delivery Details:</b></h4>
                <form class="del-info" action="config/allFunction.php?choice=3" method="post">
                    <lable>Mobile No.</lable>
                    <input type="text" name="mobile_no" placeholder="Enter mobile no"  required>
                    <lable>Address.</lable>
                    <input type="text" name="area" placeholder="Area/Village" required>
                    <input type="text" name="city" placeholder="City" required>
                    <input type="text" name="state" placeholder="State" required>
                    <input type="text" name="pincode" placeholder="Pincode" required>
                    <input type="hidden" name="p_id" value="'.$post.'">
                    <input type="hidden" name="user_id" value="'.$user_id.'">
                    <input type="submit" class="btn btn-md btn-secondary bg-pink" name="submit" value="Place Order" required>

                </form>
            </div>';

            }
        }
        else{
            return $str = '<div class="alert alert-danger" role="alert">
                <strong>Error! </strong>Product Not Found.
            </div>';
        }   
        return $str;
    }

    public function order_placed($post){
        $user_id = $post['user_id'];
        $p_id = $post['p_id'];
        $address = $post['area'].','.$post['city'].'|'.$post['state'].' '.$post['pincode'];
        $mobile = $post['mobile_no'];
        $stmt = "INSERT INTO orders (user_id, p_id, mobile_no , billing_address) VALUES ($user_id, $p_id,'$mobile','$address')";
        $results = mysqli_query($this->conn,$stmt);
        if($results == 1)
        {
            header('location:../orderlist.php');
        }
    }

    public function add_contact($post){
        $name = $post['name'];
        $email = $post['email'];
        $mobile = $post['mobile_no'];
        $sub = $post['subject'];
        $msg = $post['message'];
        $stmt = "INSERT INTO `contact_us` (`name`, `email`, `mobile_no`, `subject`, `message`) VALUES ('$name', '$email', '$mobile', '$sub', '$msg')";        
        $results = mysqli_query($this->conn,$stmt);
        if($results == 1)
        {
            return '<div class="alert alert-success" role="alert">
            <strong>Success! </strong>Added successfully.
            </div>';
        }
        else{
            return '<div class="alert alert-danger" role="alert">
            <strong>Error! </strong>Product Not Found.
        </div>';
        }

    }
}


$obj = new allFunction();
$w_id = $_GET['w_id'];
$ch = $_GET['choice'];
switch ($ch) {
    case 1:
        $obj->logout();
        break;
    case 2:
        $obj->delete_wishlist($w_id);
        break;
    case 3:
        $obj->order_placed($_POST);
        break;
    default:
        # code...
        break;
}
?>