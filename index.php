<?php   
// PHP code to get the Fibonacci series 
// Recursive function for fibonacci series. 

echo "<h3>Fibonacci series for first 12 numbers: </h3>";  
echo "\n";  


function Fibonacci($number){ 
      
    // if and else if to generate first two numbers 
    if ($number == 0) 
        return 0;     
    else if ($number == 1) 
        return 1;     
      
    // Recursive Call to get the upcoming numbers 
    else
        return (Fibonacci($number-1) +  
                Fibonacci($number-2)); 
} 
  
// Driver Code 
$number = 12; 
for ($counter = 0; $counter < $number; $counter++){   
    echo Fibonacci($counter),' '; 
} 
?> 