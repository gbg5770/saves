
     $(document).ready(function() {
    
$("#text").keydown(
  function() 
  {
    if(event.which == 13)
    {
      //event.preventDefault();
      insert();
      clearit();
      //$("#input1").css({background: 'yellow'})  // just to see it
    }
  }
);

// Scroll the log_in window to Sign_up window.
        $(".toSignUp").click(function() {
            $("#signIn_window").animate({scrollLeft:'600'}, 300);
        });
        $(".leftArrow").click(function() {
            $("#signIn_window").animate({scrollLeft:'-600'}, 300);
        });
});

     
     
     
            function cleartitle() {
                document.title = '>_<';
            }
            function clear() {
                document.getElementById("text").value = '';
            }
            function clear_login() {
                document.getElementsByClassName("clear_login").value = '';
            }
            function clearit()
            {
            setTimeout(function(){document.getElementById("text").value = ''},0);
            }
            function m()
            {
                setInterval("loadXMLDoc()", 2000);
		setInterval("useronline()", 1000);
            }
            
            function loadXMLDoc()
            
            {
            var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                var mydiv = document.getElementById("mydiv").innerHTML;
                var resp = xmlhttp.responseText;


//alert(mydiv);
                if (resp !== mydiv) {
                    document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
                    
                    setTimeout(function(){
                        var user = $('.user').html();
                        var chat = $('.chat').html();
                        var f= '(1) ' + user + ': ' + chat;
                        var id = $('.username').html();
                            if (id !== user) {
                                document.title = f;
                            }
                    },100);
                }
              }
            }
            xmlhttp.open("post","http://g.rambam770.com/chat/chats.php?plus='+plus'",true);
            xmlhttp.send();
            }
            
            
	    function useronline()   {
            
            
            var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                var useronline = document.getElementById("useronline").innerHTML;
                var resp = xmlhttp.responseText;
                if (resp !== useronline) {
                    document.getElementById("useronline").innerHTML=xmlhttp.responseText;
                    
                }
              }
            }
            xmlhttp.open("post","http://g.rambam770.com/chat/onlinenow.php",true);
            xmlhttp.send();
            }
