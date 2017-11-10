
    var btn = document.getElementById("btn");
    btn.click=function() {


    var com = document.getElementById("comments");
     

    if (com.style.display === 'block') { 
      
      com.style.display = 'none';
      
      btn.innerHTML = 'Show comments';
    }
    else { 
      
      com.style.display = 'block';
      
      btn.innerHTML = 'Hide comments';
    }
    
 };

var el = document.getElementById('form');

el.addEventListener('submit', function(){
    return confirm('Are you sure you want to submit this form?');
}, false);