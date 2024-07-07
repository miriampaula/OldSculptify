(function($) { // Begin jQuery
    $(function() { // DOM ready
      // If a link has a dropdown, add sub menu toggle.
      $('nav ul li a:not(:only-child)').click(function(e) {
        $(this).siblings('.nav-dropdown').toggle();
        // Close one dropdown when selecting another
        $('.nav-dropdown').not($(this).siblings()).hide();
        e.stopPropagation();
      });
      // Clicking away from dropdown will remove the dropdown class
      $('html').click(function() {
        $('.nav-dropdown').hide();
      });
      // Toggle open and close nav styles on click
      $('#nav-toggle').click(function() {
        $('nav ul').slideToggle();
      });
      // Hamburger to X toggle
      $('#nav-toggle').on('click', function() {
        this.classList.toggle('active');
      });
    }); // end DOM ready
  })(jQuery); // end jQuery


  $(".nav ul li").click(function() {
    $(this)
      .addClass("active")
      .siblings()
      .removeClass("active");
  });
  
  const tabBtn = document.querySelectorAll(".nav ul li");
  const tab = document.querySelectorAll(".tab");
  
  function tabs(panelIndex) {
    tab.forEach(function(node) {
      node.style.display = "none";
    });
    tab[panelIndex].style.display = "block";
  }
  tabs(0);
  



  if (document.querySelector(".alert-message").innerText > 9) {
    document.querySelector(".alert-message").style.fontSize = ".7rem";
  }
  

  $(".image-box").click(function(event) {
    var previewImg = $(this).children("img");
  
    $(this)
      .siblings()
      .children("input")
      .trigger("click");
  
    $(this)
      .siblings()
      .children("input")
      .change(function() {
        var reader = new FileReader();
  
        reader.onload = function(e) {
          var urll = e.target.result;
          $(previewImg).attr("src", urll);
          previewImg.parent().css("background", "transparent");
          previewImg.show();
          previewImg.siblings("p").hide();
        };
        reader.readAsDataURL(this.files[0]);
      });
  });
  
  
  
  