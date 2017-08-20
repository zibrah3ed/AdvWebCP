

// Create array in preparation for chartist. Aggregate type as string
// array name to be appended, and size of array
function createAggArray(aggregate,array,size){
    var search = '';
    for (i = 0; i < size; i++){
      search = aggregate + (i + 1).toString();
      array[i] = parseInt(document.getElementById(search).innerHTML);
      search = '';
    };
  };

// Function for back button navigation
  function goBack() {
      window.history.back();
  };



  // function jmfArray(arr1,arr2,arr3,arr4) {
  //
  //   var combinedArray = [];
  //
  //   for (var i=0; i < fineJMFArray.length; i++){
  //     fineJMFArray[i] = fineJMFArray[i] * fineJMF / 100;
  //   };
  //   for (var i=0; i < coarseJMFArray.length; i++){
  //     coarseJMFArray[i] = coarseJMFArray[i] * fineJMF / 100;
  //   };
  //   for (var i=0; i < intJMFArray.length; i++){
  //     intJMFArray[i] = intJMFArray[i] * fineJMF / 100;
  //   };
  //   for (var i=0; i < int2JMFArray.length; i++){
  //     int2JMFArray[i] = int2JMFArray[i] * fineJMF / 100;
  //   };
  //   for (var i=0; i < fineJMFArray.length; i++){
  //     combinedArray[i] = fineJMFArray[i] + coarseJMFArray[i] + intJMFArray[i] + int2JMFArray[i];
  //   }
  //   return combinedArray;
  // };
