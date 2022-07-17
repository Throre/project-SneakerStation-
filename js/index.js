$('.slider').slick({
    infinite: true,
    dots: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay:true,
    autoplaySpeed:3000,
    pauseOnFocus:true,
    pauseOnHover:true,
    pauseOnDotsHover:true,
    responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
  });


$('#signin_button').click(function(){ window.location = 'http://localhost/project/login.php'});

function profile() {
  window.location.href = "http://localhost/project/profile.php";
}

function goToSite() {
  window.location.href = "http://localhost/project/index.php";
}
function goToRegister() {
  window.location.href = "http://localhost/project/register.php";
}
function goToLogin() {
  window.location.href = "http://localhost/project/login.php";
}




