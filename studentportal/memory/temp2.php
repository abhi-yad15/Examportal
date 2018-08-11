<!DOCTYPE html>
<html lang="en">
<head>
<title>Home Page</title>
<meta charset="utf-8">
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette">
  <link rel="stylesheet" href="sweetalert/./assets/example.css">
  <link rel="stylesheet" href="sweetalert/./assets/bootstrap4-buttons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="preload" href="https://unsplash.it/400/200/?random" as="image">
  <link rel="preload" href="https://bit.ly/1Nqn9HU" as="image">

  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- This is what you need -->
  <script src="sweetalert/./dist/sweetalert2.all.min.js"></script>
    <script> 
     $(document).ready(function(){
      Display111();
    });
   </script>
  <script type="text/javascript">
    function Display111(){       
     var temp='QUE/PSI_1';    
      swal({
        title: 'Auto close alert!',
        text: '',
        imageUrl: temp,
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
        animation: false,
        timer: 15000,
        onOpen: function () {
            swal.showLoading()
        }
      }).then(
        function () {},
        // handling the promise rejection
        function (dismiss) {
           if (dismiss === 'timer') {
             console.log('I was closed by the timer')
           }       
        })
     }
 </script>
 <script type="text/javascript">
           function Redirect(){
            window.location.href = "registration/"
           }
        </script>     
</head>
</html>
