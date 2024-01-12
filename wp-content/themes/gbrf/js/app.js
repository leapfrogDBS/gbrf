document.addEventListener("DOMContentLoaded", function(){

  /*Toggle colour logo and menu button when open/close menu */
  const btn = document.getElementById('menu-btn');
  const searchButton = document.getElementById('search-icon');
  const searchContainer =document.getElementById('search-container');
  const mobileSearchButton = document.getElementById('mobile-search-icon');
  const mobBtn = document.getElementById('mobile-menu-btn');
  const nav = document.getElementById('splash-menu');
  const searchPage = document.getElementById('search-page');
  const hamburgerContainer = document.querySelector('.hamburger');
  const searchClose = document.querySelector('#close-search');
  const mobileSearchClose = document.querySelector('#mobile-close-search');
  const mobileSearchContainer = document.querySelector('#mobile-search-container');

    var logo = document.querySelector('#logo-container img');
    var searchIcon = document.querySelector('#search-icon')
    var whiteSearchIcon = searchIcon.getAttribute('data-white');
    var orangeSearchIcon = searchIcon.getAttribute('data-orange');
		var defaultLogo = logo.getAttribute('data-white');
		var orangeLogo = logo.getAttribute('data-orange');
    var blueLogo = logo.getAttribute('data-blue');
    var headerContainer = document.querySelector('.header-container');
    var navContainer = document.querySelector('.header-container nav');
  
  btn.addEventListener('click', () => {
      btn.classList.toggle('open')
      nav.classList.toggle('invisible')
      nav.classList.toggle('opacity-0')
      nav.classList.toggle('opacity-100')
      
      if (btn.classList.contains('open')) {
        logo.src = orangeLogo;
        searchIcon.src = orangeSearchIcon;
        navContainer.style.background = "#0A2882"; 
        if (!document.querySelector('body').classList.contains('no-scroll')) {
            document.querySelector('body').classList.toggle('no-scroll');
        }
      } else {
          navContainer.style.background = "transparent";
          activeSlide = document.querySelector('.section.active');
          if (activeSlide) {
            if (activeSlide.classList.contains('blue-logo')) {
              logo.src = blueLogo;
            }
            if (!activeSlide.classList.contains('header-orange') && !activeSlide.classList.contains('blue-logo')) {
              logo.src = defaultLogo;
              searchIcon.src = whiteSearchIcon; 
            }
          }
          if(window.scrollY==0 && (document.querySelector('#fullpage .section').classList.contains('bg-transparent') || document.querySelector('#fullpage .section').classList.contains('bg-blue'))){
            logo.src = defaultLogo;
            searchIcon.src = whiteSearchIcon;
          }
          
         
          document.querySelector('body').classList.toggle('no-scroll');  
      }
      headerContainer.classList.toggle('active');
      document.querySelector('.scroll-indicator-controller').classList.toggle('hidden');
      
      searchContainer.classList.toggle('invisible');

      
  });

  searchContainer.addEventListener('click', () => {
    searchButton.classList.toggle('open')
    searchPage.classList.toggle('invisible')
    searchPage.classList.toggle('opacity-0')
    searchPage.classList.toggle('opacity-100')
    
    if (searchButton.classList.contains('open')) {
      logo.src = orangeLogo;
      navContainer.style.background = "#6476FA"; 
      if (!document.querySelector('body').classList.contains('no-scroll')) {
          document.querySelector('body').classList.toggle('no-scroll');
      }
      var searchBox = document.querySelector('#keyword');
      searchBox.focus();
      if (!searchBox.value) {
        document.querySelector('#datafetch').innerHTML= "";
      }
    } else {
        if (btn.classList.contains('open')) {
          logo.src = orangeLogo;
          navContainer.style.background = "transparent";
        } else {
          navContainer.style.background = "transparent";
          activeSlide = document.querySelector('.section.active');
          if (activeSlide) {
            if (activeSlide.classList.contains('blue-logo')) {
              logo.src = blueLogo;
            }
            if (!activeSlide.classList.contains('header-orange') && !activeSlide.classList.contains('blue-logo')) {
              logo.src = defaultLogo;
              searchIcon.src = whiteSearchIcon; 
            }
          }
          document.querySelector('body').classList.toggle('no-scroll');  
          if(window.scrollY==0 && (document.querySelector('#fullpage .section').classList.contains('bg-transparent') || document.querySelector('#fullpage .section').classList.contains('bg-blue'))){
            logo.src = defaultLogo;
            searchIcon.src = whiteSearchIcon;
          }
        }
            
    }
    searchIcon.classList.toggle('invisible');
    searchClose.classList.toggle('invisible');
    hamburgerContainer.classList.toggle('opacity-0');
    headerContainer.classList.toggle('active');
    document.querySelector('.scroll-indicator-controller').classList.toggle('hidden');  

    
});

mobileSearchContainer.addEventListener('click', () => {
  mobileSearchButton.classList.toggle('open')
  mobileSearchButton.classList.toggle('invisible');
  mobileSearchClose.classList.toggle('invisible');
  searchPage.classList.toggle('invisible')
  searchPage.classList.toggle('opacity-0')
  searchPage.classList.toggle('opacity-100')
  mobBtn.classList.toggle('opacity-0');
});

mobBtn.addEventListener('click', () => {
  mobBtn.classList.toggle('open')
  nav.classList.toggle('invisible')
  nav.classList.toggle('opacity-0')
  nav.classList.toggle('opacity-100')
  mobileSearchContainer.classList.toggle('invisible')
    
});

  
  /*Scroll to top button*/
  var scrollToTopBtn = document.getElementById("to-top-button");
  
  function scrollToTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }
  scrollToTopBtn.addEventListener("click", scrollToTop)
  
  
  easyScrollDots({
    'fixedNav': false,
    'fixedNavId': '',
    'fixedNavUpward': false,
    'offset': 116
  });

  var logo = document.querySelector('#logo-container img');
  var searchIcon = document.querySelector('#search-icon')
  var whiteSearchIcon = searchIcon.getAttribute('data-white');
  var orangeSearchIcon = searchIcon.getAttribute('data-orange');
  var defaultLogo = logo.getAttribute('data-white');
  var orangeLogo = logo.getAttribute('data-orange');
  var blueLogo = logo.getAttribute('data-blue');
  var countersRun = 0;
  $(window).scroll(function () {
    
    $('.section').each(function () {
        var w = $(window).scrollTop();
        var t = $(this).offset().top - 116;
        if (w > t) {
            $('nav').css({
                "background-color": $(this).css('background-color')
            }); 
            if (this.classList.contains('header-orange')) {
              logo.src = orangeLogo;
              searchIcon.src = orangeSearchIcon;
              document.querySelector('.desktop-header-container').classList.add('orange');
            } else {
              searchIcon.src = whiteSearchIcon;
              if (this.classList.contains('blue-logo')) {
                logo.src = blueLogo;
              } else {
                logo.src = defaultLogo;
                document.querySelector('.desktop-header-container').classList.remove('orange');
              }
            }   
            if (this.querySelector('.counter-container') && countersRun==0) {
              runCounters();
              countersRun++;
            }
            prevActive = document.querySelector('.section.active');
            if (prevActive) {
              prevActive.classList.remove('active');
            }
            this.classList.add('active');                   
        }
    });
}); 

var dotMenu = document.querySelector('.scroll-indicator-controller');
var sections = document.querySelectorAll(".section");

var observer = new IntersectionObserver(entries => { 
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      if (entry.target.classList.contains('bg-white')) {
        dotMenu.classList.add("blue-menu");
      } else {
        dotMenu.classList.remove("blue-menu");
      }
      if (entry.target.classList.contains('hide-nav')) {
        dotMenu.classList.add("hidden");
      } else {
        dotMenu.classList.remove("hidden");
      }
    }
  })
},
{
 rootMargin: "-100% 0px 0%",
 threshold: [0],
}
)
for (i = 0; i < sections.length; i++) {
  observer.observe(sections[i]);
}



}); //end DOM Load

/*Number Counters*/
  function runCounters () {
    jQuery('.counter').each( function() {       
          var countup = jQuery(this);
          var value = countup.data('value');
          var suffix = countup.data('suffix');
          var prefix = countup.data('prefix');
          var id = countup.attr('id');
          var dec = countup.attr('data-decimalPlaces');
          
          var demo = new CountUp(id, value, {suffix: suffix, prefix: prefix,  separator: ',', decimal: '.', decimalPlaces: dec});
            
          
          demo.start();
    });
  }

/* Our Services Tabbed Content */
  function openSection(evt, sectionName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    // Show the current tab, and add an "active" class to the button that opened the tab
       var sections = document.getElementsByClassName(sectionName);
    for(var i = 0; i < sections.length; i++)
      {
        sections[i].style.display ="block";
        sections[i].classList.remove('preview');
      }
    evt.currentTarget.className += " active";
  }

  /*Preview Content*/
  function previewSection(evt, sectionName) {
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      if (tabcontent[i].classList.contains(sectionName)) {
        tabcontent[i].classList.add('preview');
      } else {
        tabcontent[i].classList.add('unpreview')
      }
    }
  
  }
   /*Reset Content*/
   function resetSection(evt, sectionName) {
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      if (tabcontent[i].classList.contains(sectionName)) {
        tabcontent[i].classList.remove('preview');
      } else {
        tabcontent[i].classList.remove('unpreview')
      }
    }
  
  }

 
  //animate
document.addEventListener( 'DOMContentLoaded', function() {
  const scrollElements = document.querySelectorAll(".js-scroll");
  
  const elementInView = (el, dividend = 1) => { 
    const elementTop = el.getBoundingClientRect().top;
  
    return (
      elementTop <=
      (window.innerHeight || document.documentElement.clientHeight) / dividend
    );
  };
  
  const elementOutofView = (el) => {
    const elementTop = el.getBoundingClientRect().top;
  
    return (
      elementTop > (window.innerHeight || document.documentElement.clientHeight)
    );
  };
  
  const displayScrollElement = (element) => {
    element.classList.add("scrolled");
  };
  
  const hideScrollElement = (element) => {
    element.classList.remove("scrolled");
  };
  
  const handleScrollAnimation = () => {
    scrollElements.forEach((el) => {
      if (elementInView(el, 1.25)) {
        displayScrollElement(el);
      } else if (elementOutofView(el)) {
        hideScrollElement(el)
      }
    })
  }
  
  window.addEventListener("scroll", () => { 
    handleScrollAnimation();
  });
  
  } );



