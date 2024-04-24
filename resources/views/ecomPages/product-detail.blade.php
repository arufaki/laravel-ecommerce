<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="css/product-detail.css" />
  </head>
  <body>
    <header>
      <nav class="container">
        <div class="nav-wrap nav-border">
          <h1 class="logos logo">FKH.CO</h1>
          <input
            type="text"
            placeholder="Search product..."
            class="search-wrap"
          />
          <div class="icons-wrap">
            <button class="cart-btn">
              <img src="assets/svg/shopping-cart.svg" alt="cart-icon" />
            </button>
            <button class="user-btn">
              <img src="assets/svg/user.svg" alt="user-icon" />
            </button>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section id="product">
        <div class="cart-wrap container">
          <div class="cart-wrapper">
            <div class="product-image-wrap">
              <div class="main-image">
                <img
                  src="assets/png/products/hoodie.png"
                  alt="product-image"
                  class="currentImg"
                />
              </div>
              <div class="child-image">
                <div class="image">
                  <img
                    src="assets/png/products/hoodie.png"
                    alt="product-image"
                    class="thumb"
                  />
                </div>
                <div class="image">
                  <img
                    src="assets/png/products/model.png"
                    alt="product-image"
                    class="thumb"
                  />
                </div>
                <div class="image">
                  <img
                    src="assets/png/products/real-hoodies.png"
                    alt="product-image"
                    class="thumb"
                  />
                </div>
              </div>
            </div>
            <div class="product-description">
              <div class="product-detail">
                <h1>PULLOVER SWEAT HOODIE</h1>
                <div class="rating product-rating">
                  <div class="stars">
                    <img src="assets/svg/rating.svg" alt="rating" />
                    <img src="assets/svg/rating.svg" alt="rating" />
                    <img src="assets/svg/rating.svg" alt="rating" />
                    <img src="assets/svg/rating.svg" alt="rating" />
                    <img src="assets/svg/rating.svg" alt="rating" />
                  </div>
                  <p class="rate">4.5/5</p>
                </div>
                <p class="price pricing-detail">$120</p>
                <p class="product-body">
                  Pullover hoodie with updated texture on both sides. The newest
                  layer with fiber does not fall off easily.
                </p>
              </div>
              <div class="product-size">
                <p class="choose-size">Choose Size</p>
                <div class="size-wrap">
                  <div class="size">
                    <p>S</p>
                  </div>
                  <div class="size">
                    <p>M</p>
                  </div>
                  <div class="size">
                    <p>L</p>
                  </div>
                  <div class="size">
                    <p>XL</p>
                  </div>
                  <div class="size">
                    <p>XXL</p>
                  </div>
                </div>
              </div>

              <div class="cart">
                <div class="quantity">
                  <button>-</button>
                  <p>1</p>
                  <button>+</button>
                </div>
                <button class="add-to-cart">Add To Cart</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div id="subscribe">
        <div class="subscribe-wrap container">
          <div class="subscribe-content container">
            <h1>STAY UPTO DATE ABOUT OUR LATEST OFFERS</h1>
            <div class="subscribe-form">
              <div class="subscribe-input-wrap">
                <img src="assets/svg/mail.svg" alt="mail-icon" />
                <input
                  type="text"
                  placeholder="Enter your email address..."
                  class="subscribe-input"
                />
              </div>
              <button class="subscribe-btn">Subscribe to Newsletter</button>
            </div>
          </div>
        </div>
      </div>
      <div class="footer container">
        <div class="footer-content">
          <h1 class="footer-logo">FKH.CO</h1>
          <p class="footer-body">
            We have clothes that suits your style and which you’re proud to
            wear. From women to men.
          </p>
        </div>
        <h5>
          Created with ❤ by
          <a
            href="https://github.com/Arufaki"
            target="_blank"
            class="creator-name"
            >Alfakih Anggi Subekti</a
          >
        </h5>
      </div>
    </footer>
    <script src="./js/app.js"></script>
  </body>
</html>
