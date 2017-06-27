  
//Angular Module to hide and show forms
  var app = angular.module('MyApp', [])


    app.controller('ShowController', function ($scope, $http) {
            //This will hide the DIV by default.
            $scope.IsVisible = false;
            $scope.IsVisible2=false;
         
            
            $scope.ShowHide = function () {
           //If DIV is visible it will be hidden and vice versa.

          $scope.IsVisible = $scope.IsVisible ? false : true;
                
  				$scope.IsVisible2 = $scope.IsVisible2 ? false : true;



            }

        });


    app.controller('ShowInput', function($scope){
      $scope.driverIDType='1';

    });



//Angular module to use our deliver service created
angular.module('main', []).controller('mainController', mainController).run(function($rootScope) {
        $rootScope.delivers = _deliver;
    });







// inject the Deliver service into our controller
function mainController($scope, $window, $http ,$location, Deliver) {


 
   
  $scope.loading = true;


  Deliver.get().then(function(response) {
  $scope.delivers =  angular.fromJson(response.data);
  $scope.loading = false;
   console.log($scope.delivers);
        });


$scope.showDeliver = function(pid){
                //console.log(pid) ----> return 16

                Deliver.show(pid).then(function(response) {

                  url= angular.fromJson(response.data);
                  window.location.replace(url.url);
          
});
            };

    // function to handle submitting the form
    // SAVE A CheckOut and Exit Weight================
    $scope.submitCheckOut = function($id) {

      $scope.loading = true;


     //Get the id of the specific Delivery
       var id=$id;

     //Ask user to input the exit weight!
       var x= prompt("Please, add the exit weight!!");
       
      //Verify if the value inputed is a number or if it was an empty field
       if (isNaN(x) || x=="")
{


  alert("The following is not a number!");

    $scope.loading = true;

  Deliver.get().then(function(response) {
         
         $scope.loading = false;

         $scope.delivers =  angular.fromJson(response.data);


        
         console.log($scope.delivers);
       
      });


}
  else
    {
  
  alert("The exit weight you entered is " + x +"!");



         // save the checkOut-setting the exit time
        // use the function we created in our service
    Deliver.insertWeight(id,x).then(function(response){
    

    x= angular.fromJson(response.data);

    console.log(x.success);

      if (x.success==true) {

        alert("The exit weight was correctly inserted!");


        Deliver.get().then(function(response) {
         
         $scope.loading = false;

         $scope.delivers =  angular.fromJson(response.data);


        
         console.log($scope.delivers);
       
      });
       
    }
      else{ 

        alert("The exit weight was not inserted!" + "\n" +"You already have one inserted!!");

          Deliver.get().then(function(response) {
         
         $scope.loading = false;

         $scope.delivers =  angular.fromJson(response.data);


        
         console.log($scope.delivers);
       
      });
    }
       

    }).catch(function(data, status){
      console.error(response.status,response.data);
     

    }).finally(function(){

      Deliver.insertExitTime(id).then(function(response){

        y= angular.fromJson(response.data);
        console.log(y.success);


        if (y.success==true) {

          alert("The CheckOut was correctly done!");
          
       

          Deliver.get().then(function(response) {
         
         $scope.loading = false;

         $scope.delivers =  angular.fromJson(response.data);


        
         console.log($scope.delivers);
       
      });
         
        }
        else{
           alert("The CheckOut process failed!" + "\n" +"CheckOut can only be done once!");

         Deliver.get().then(function(response) {
         
         $scope.loading = false;

         $scope.delivers =  angular.fromJson(response.data);


        
         console.log($scope.delivers);
       
      });

         }
               


      }).catch(function(data, status){
        console.error(response.status,response.data);

        Deliver.get().then(function(response) {
         
         $scope.loading = false;

         $scope.delivers =  angular.fromJson(response.data);


        
         console.log($scope.delivers);
       
      });
        
      })
    });


   

    };
    }

};








  function ConfirmExternVisitor()
  {
  var x = confirm("Are you sure you want to add this visitor?");
  if (x)
    return true;
  else
    return false;
  }


  