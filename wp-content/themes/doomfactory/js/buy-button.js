(function () {
  var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';
  if (window.ShopifyBuy) {
    if (window.ShopifyBuy.UI) {
      ShopifyBuyInit();
    } else {
      loadScript();
    }
  } else {
    loadScript();
  }

  function loadScript() {
    var script = document.createElement('script');
    script.async = true;
    script.src = scriptURL;
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
    script.onload = ShopifyBuyInit;
  }

  var buttonStyles = {
    'font-family': 'Quantico',
    'font-weight': 'bold',
    'border-radius': 0,
    'background-color': '#d30000',
    'border-radius': '3px',
    ':hover': {
      'background-color': '#ff0000',
      'color': '#000000'
    }
  };

  var marginStyles = {
    '@media (min-width: 500px)': {
      'margin-left': '0 !important',
      'margin-right': 'calc(40% + 25px)',
    },
    '@media (min-width: 680px)': {
      'margin-left': '0 !important',
      'margin-right': 'calc(60% + 25px)',
    }
  };

  function ShopifyBuyInit() {
    var client = ShopifyBuy.buildClient({
      domain: 'doom-factory.myshopify.com',
      storefrontAccessToken: '40c3458cc234c4aef35d29583bdfec8f',
    });

    ShopifyBuy.UI.onReady(client).then(function (ui) {
      ui.createComponent('product', {
        id: productID,
        node: document.getElementById('product'),
        options: {
          product: {
            layout: 'horizontal',
            googleFonts: ['Quantico'],
            contents: {
              description: true,
              quantity: true,
              quantityDecrement: true,
              quantityIncrement: true,
            },
            order: [
              'img',
              'price',
              'description',
              'options',
              'quantity',
              'button',
            ],      
            styles: {
              imgWrapper: {
                'float': 'right !important',
                '@media (min-width: 500px)': {
                  'float': 'right',
                },
                '@media (min-width: 680px)': {
                  'float': 'right',
                }
              },
              prices: Object.assign({}, marginStyles),
              price: Object.assign({}, marginStyles, {
                'font-family': 'Quantico',
                'font-size': '20px',
                'padding-top': '15px',
              }),
              description: Object.assign({}, marginStyles, {
                'font-family': 'Arial',
              }),
              quantity: Object.assign({}, marginStyles, {
                'overflow': 'hidden',
                'margin': '0 auto'
              }),
              options: Object.assign({}, marginStyles, {
                'margin-top': '20px',
              }),
              buttonWrapper: Object.assign({}, marginStyles),
              button: Object.assign({}, marginStyles, buttonStyles, {
                'position': 'relative',
              }),
              quantityButton: {
              },
              quantityIncrement: {
                'background-color': '#f4f4f4',
              },
              quantityDecrement: {
                'background-color': '#f4f4f4',
              },
              quantityInput: {
              }
            },
            text: {
              button: 'ADD TO CART'
            },
          },
          toggle: {
            styles: {
              toggle: {
                'background-color': 'black',
                ':hover': {
                  'background-color': '#d30000',
                },
              },
            }
          },
          cart: {
            googleFonts: ['Quantico'],
            styles: {
              title: {
                'font-family': 'Quantico',
              },
              button: buttonStyles,
            }
          }
        }
      });
    });
  }
})();
