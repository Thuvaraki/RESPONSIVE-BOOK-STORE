<?php
   include 'config.php';
   session_start();

   $user_id= $_SESSION['user_id'];

   if(!isset($user_id)){
    header('location:login.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about us</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>
<body>
   <?php
      include 'header.php';
   ?>

  <div class="heading">
     <h3>about us</h3>
     <p><a href="home.php">home</a>/about</p>
  </div>

   <section class="about">
   <div class="flex">
      <div class="image">
        <img src="images/about-img.jpg" alt="">
      </div>
      <div class="content">
         <h3>Why choose us?</h3>
         <p>At Bookly, we're not just a bookstore; we're your literary haven. With a profound passion for stories, our mission is to bridge the gap between 
            readers and the tales they adore. We go beyond selling books; we foster a thriving community of bibliophiles who share our unwavering belief
             in the enchantment of words.</p>
         <h1>A World of Possibilities</h1>
         <p>Our shelves boast a meticulously curated collection spanning diverse genres, ensuring there's a book for every reader's soul. 
             Whether you seek thrilling adventures, heartwarming romances, thought-provoking classics, or cutting-edge non-fiction, we've handpicked the finest
              literature to ignite your imagination.
         </p>
         <h1>Expertise You Can Trust</h1>
         <p>At Bookly, our team of dedicated book enthusiasts stands ready to guide you on your literary journey. We pride ourselves on our knowledge and love 
             for literature, and we're here to provide recommendations, answer your queries, and create an environment where bookworms can unite and share their love
              for the written word.
         </p>
         <h1>More Than a Bookstore</h1>
         <p>We believe that books hold the power to inspire, captivate, and transform lives. When you choose Bookly, you're choosing a sanctuary where the 
             magic of words comes alive. Join our community of fellow book lovers, and let us help you discover, explore, and fall in love with stories anew. 
             Trust in our expertise, embrace the adventure, and immerse yourself in a world of endless possibilities.
         </p>
         <a href="contact.php" class="btn">Contact us</a>
      </div>
   </div>
  </section>

  <section class="reviews">
      <div class="swiper reviews-slider">
         <div class="review-heading">
            <h2>CLIENT REVIEWS</h2>
         </div>
         <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>                                  
                      </div>
                      <p>I have read 'Aisha and the White Angel' and the book is very enjoyable and inspiring. The appear to be a bit of fiction and non-fiction.
                         The triumph and tragedy of this book is a magnificent boost to a anyone who goes through struggle in life</p>
                           <h3>Aathvik</h3>                        
                           <img src="images/pic-1.png" alt="">
                      </div>

                      <div class="swiper-slide">
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>                                 
                      </div>
                      <p>Charles Dickens' 'David Copperfield' is a literary masterpiece that stands the test of time. This coming-of-age novel offers 
                              a vivid portrayal of David's life, trials, and triumphs. Dickens' storytelling prowess shines in every chapter, making it a
                               must-read classic."</p>
                      <h3>Shiveka</h3>                           
                      <img src="images/pic-2.png" alt="">
                      </div>

                      <div class="swiper-slide">
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>                                  
                      </div>
                      <p>"Wilkie Collins' 'The Moonstone' is a thrilling mystery that keeps readers guessing until the very end. The intricate plot, a stolen gem, and a cast of intriguing characters make this a gripping tale of intrigue and suspense. A true gem of classic detective fiction!"</p>
                      <h3>Thaksha</h3>                           
                      <img src="images/pic-3.png" alt="">
                      </div>

                      <div class="swiper-slide">
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>                                  
                      </div>
                      <p>"William Makepeace Thackeray's 'Vanity Fair' is a satirical masterpiece that provides a witty and sharp commentary on society and ambition. 
                        The characters, particularly the cunning Becky Sharp, come to life in this biting social satire. A classic novel for those who appreciate
                         clever storytelling."</p>
                      <h3>Aarav</h3>                           
                      <img src="images/pic-4.png" alt="">
                      </div>

                      <div class="swiper-slide">
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>                         
                      </div>
                            <p>"Laura Roberts' 'The Mirror' is a contemporary novel that explores themes of identity, self-discovery, and second chances. 
                              The narrative weaves between past and present, keeping readers engaged and curious. This thought-provoking book offers a 
                              fresh perspective on life's twists and turns."</p>
                           <h3>Vikum</h3>                           
                           <img src="images/pic-5.png" alt="">
                      </div>

                      <div class="swiper-slide">
                        <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>                                  
                      </div>
                            <p> "James Anderson's 'The Hidden Truth' is an enthralling thriller that will keep you on the edge of your seat. With unexpected
                               plot twists and a relentless pursuit of the truth, this book is a gripping page-turner. Fans of suspense and mystery won't
                                be able to put it down."</p>
                           <h3>Thuva</h3>                           
                           <img src="images/pic-6.png" alt="">
                      </div>
                 </div>
             </div>
          </section>

          <section class="authors">
            <h1 class="title">Greate authors</h1>
            <div class="box-container">
               <div class="box">
                  <img src="images/author-1.jpg" alt="">
                  <div class="share">
                     <a href="#" class="fab fa-facebook"></a>
                     <a href="#" class="fab fa-instagram"></a>
                     <a href="#" class="fab fa-linkedin"></a>
                     <a href="#" class="fab fa-twitter"></a>
                  </div>
                  <h3>Armando Lucas Correa</h3>
               </div>
               <div class="box">
                  <img src="images/author-2.jpg" alt="">
                  <div class="share">
                     <a href="#" class="fab fa-facebook"></a>
                     <a href="#" class="fab fa-instagram"></a>
                     <a href="#" class="fab fa-linkedin"></a>
                     <a href="#" class="fab fa-twitter"></a>
                  </div>
                  <h3>jess Kidd</h3>
               </div>
               <div class="box">
                  <img src="images/author-3.jpg" alt="">
                  <div class="share">
                     <a href="#" class="fab fa-facebook"></a>
                     <a href="#" class="fab fa-instagram"></a>
                     <a href="#" class="fab fa-linkedin"></a>
                     <a href="#" class="fab fa-twitter"></a>
                  </div>
                  <h3>Martha McPhee</h3>
               </div>
               <div class="box">
                  <img src="images/author-4.jpg" alt="">
                  <div class="share">
                     <a href="#" class="fab fa-facebook"></a>
                     <a href="#" class="fab fa-instagram"></a>
                     <a href="#" class="fab fa-linkedin"></a>
                     <a href="#" class="fab fa-twitter"></a>
                  </div>
                  <h3>Megan Miranda</h3>
               </div>
               <div class="box">
                  <img src="images/author-5.jpg" alt="">
                  <div class="share">
                     <a href="#" class="fab fa-facebook"></a>
                     <a href="#" class="fab fa-instagram"></a>
                     <a href="#" class="fab fa-linkedin"></a>
                     <a href="#" class="fab fa-twitter"></a>
                  </div>
                  <h3>Helen Phillips</h3>
               </div>
               <div class="box">
                  <img src="images/author-6.jpg" alt="">
                  <div class="share">
                     <a href="#" class="fab fa-facebook"></a>
                     <a href="#" class="fab fa-instagram"></a>
                     <a href="#" class="fab fa-linkedin"></a>
                     <a href="#" class="fab fa-twitter"></a>
                  </div>
                  <h3>Kristin Harmel</h3>
               </div> 
            </div>
          </section>

          <div class="load-more" style="margin-top:1rem; text-align:center; margin-bottom:1rem;">
             <a href="shop.php" class="option-btn">load more</a>
         
          </div>

          <!-- swiper js link -->
          <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
          <!-- js link -->
          <script src="js/script.js"></script>

<?php
      include 'footer.php';
   ?>


</body>
</html>