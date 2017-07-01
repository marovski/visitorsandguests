  
//Angular Module to hide and show forms
var app= angular.module('MyApp', []).controller('ShowController', ShowController).controller('showInputController', showInputController);


    function ShowController($scope, $timeout){


    $scope.loading = false;
            //This will hide the DIV by default.
            $scope.IsVisible=false;
            $scope.IsVisible2=false;
          $timeout(function() {      
        $scope.loading = true;
      }, 600);
          
            console.log($scope.IsVisible);


            $scope.ShowHide = function (id) {
           //If DIV is visible it will be hidden and vice versa.
            if (id==1) {

        $scope.IsVisible = $scope.IsVisible ? false : true;
            }else
            {

              $scope.IsVisible2 = $scope.IsVisible2 ? false : true;
            }
         
                
  				



            }

        }


function showInputController($scope, $timeout){

   
    $scope.loading = false;
    $scope.driverIDType='0';
     $scope.visitorCitizenCardType='1';

      $scope.itemCategory='0';

      $timeout(function() {      
      $scope.loading = true;
      }, 600);
    

      

      console.log( $scope.visitorCitizenCardType);
    }




// //Angular module to use our deliver service created
// angular.module('main', []).controller('mainController', mainController).run(function($rootScope) {
//         $rootScope.delivers = _deliver;
//     });







// // // inject the Deliver service into our controller
// // function mainController($scope, $window, $http ,$location, $timeout, Deliver) {

// //    $scope.loading = false;


// //  $timeout(function() {      
//         $scope.loading = true;
//       }, 600);
          
      
   
  


//   Deliver.get().then(function(response) {

   
//   $scope.delivers =  angular.fromJson(response.data);
  
//    console.log($scope.delivers);
//         });


// $scope.showDeliver = function(pid){
//                 //console.log(pid) ----> return 16

//                 Deliver.show(pid).then(function(response) {

//                   url= angular.fromJson(response.data);
//                   window.location.replace(url.url);
          
//                           });
//             };

//     // function to handle submitting the form
//     // SAVE A CheckOut and Exit Weight================
//     $scope.submitCheckOut = function($id) {

     


//      //Get the id of the specific Delivery
//        var id=$id;

//      //Ask user to input the exit weight!
//        var x= prompt("Please, add the exit weight!!");
       
//       //Verify if the value inputed is a number or if it was an empty field
//        if (isNaN(x) || x=="")
// {


//   alert("The following is not a number!");

    

//   Deliver.get().then(function(response) {
         

//          $scope.delivers =  angular.fromJson(response.data);


        
//          console.log($scope.delivers);
       
//       });


// }
//   else
//     {
  
//   alert("The exit weight you entered is " + x +"!");



//          // save the checkOut-setting the exit time
//         // use the function we created in our service
//     Deliver.insertWeight(id,x).then(function(response){
    

//     x= angular.fromJson(response.data);

//     console.log(x.success);

//       if (x.success==true) {

//         alert("The exit weight was correctly inserted!");


//         Deliver.get().then(function(response) {
         
    

//          $scope.delivers =  angular.fromJson(response.data);


        
//          console.log($scope.delivers);
       
//       });
       
//     }
//       else{ 

//         alert("The exit weight was not inserted!" + "\n" +"You already have one inserted!!");

//           Deliver.get().then(function(response) {
         


//          $scope.delivers =  angular.fromJson(response.data);


        
//          console.log($scope.delivers);
       
//       });
//     }
       

//     }).catch(function(data, status){
//       console.error(response.status,response.data);
     

//     }).finally(function(){

//       Deliver.insertExitTime(id).then(function(response){

//         y= angular.fromJson(response.data);
//         console.log(y.success);


//         if (y.success==true) {

//           alert("The CheckOut was correctly done!");
          
       

//           Deliver.get().then(function(response) {
         


//          $scope.delivers =  angular.fromJson(response.data);


        
//          console.log($scope.delivers);
       
//       });
         
//         }
//         else{
//            alert("The CheckOut process failed!" + "\n" +"CheckOut can only be done once!");

//          Deliver.get().then(function(response) {
         
         

//          $scope.delivers =  angular.fromJson(response.data);


        
//          console.log($scope.delivers);
       
//       });

//          }
               


//       }).catch(function(data, status){
//         console.error(response.status,response.data);

//         Deliver.get().then(function(response) {
         
     

//          $scope.delivers =  angular.fromJson(response.data);


        
//          console.log($scope.delivers);
       
//       });
        
//       })
//     });


   

//     };
//     }

// };











  