function removeActiveClasses() {
    const tabs = document.querySelectorAll('.account__tab');
    const contents = document.querySelectorAll('.tab__content');
    
    tabs.forEach(tab => {
      tab.classList.remove('active-tab');
    });
    contents.forEach(content => {
      content.classList.remove('active-tab');
    });
  }
  
  // Function to add the active class to the clicked tab and corresponding content
  function activateTab(target) {
    removeActiveClasses();
    const contentId = target.getAttribute('data-target');
    const content = document.querySelector(contentId);
    target.classList.add('active-tab');
    content.classList.add('active-tab');
  }