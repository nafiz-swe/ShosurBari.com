// Mobile Response Gender Start
    let male = document.getElementById('male_mob');
    let female = document.getElementById('female_mob');
    
    male.addEventListener('click', function() {
        if (male.checked) {
            female.checked = false;
        }
    });
    
    female.addEventListener('click', function() {
        if (female.checked) {
            male.checked = false;
        }
    });
// Mobile Response Gender End








window.addEventListener("scroll", function() {
    var navbar = document.querySelector(".navbar-inner_1");
    
    // Check if the page is scrolled down more than 50 pixels
    if (window.pageYOffset > 50) {
      navbar.style.boxShadow = "0 -3px 12px 0 #000";
      // You can modify the box shadow style here to your desired effect
    } else {
      navbar.style.boxShadow = "none";
    }
  });
  