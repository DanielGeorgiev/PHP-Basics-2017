<?php
$groupSize = intval(fgets(STDIN));
$package = trim(fgets(STDIN));
$totalPrice = 0;
$hall = null;
$discount = 0;
$pricePerPerson = 0;

if ($package === "Normal"){
    $discount = 5/100;
    $totalPrice += 500;
}else if ($package === "Gold"){
    $discount = 10/100;
    $totalPrice += 750;
}else if ($package === "Platinum"){
    $discount = 15/100;
    $totalPrice += 1000;
}

if ($groupSize <= 50){
    $totalPrice += 2500;
    $hall = "Small Hall";
    $totalPrice -= $totalPrice * $discount;
    $pricePerPerson = number_format($totalPrice / $groupSize, 2);
}else if ($groupSize > 50 && $groupSize <= 100){
    $totalPrice += 5000;
    $hall = "Terrace";
    $totalPrice -= $totalPrice * $discount;
    $pricePerPerson = number_format($totalPrice / $groupSize, 2);
}else if ($groupSize > 100 && $groupSize <= 120){
    $totalPrice += 7500;
    $hall = "Great Hall";
    $totalPrice -= $totalPrice * $discount;
    $pricePerPerson = number_format($totalPrice / $groupSize, 2);
}else{
    echo "We do not have an appropriate hall.";
    return;
}

echo "We can offer you the $hall\n";
echo "The price per person is $pricePerPerson$";