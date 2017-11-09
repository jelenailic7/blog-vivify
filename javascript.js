
    var btn = document.getElementById("btn");
    btn.onclick=function(com) {


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
