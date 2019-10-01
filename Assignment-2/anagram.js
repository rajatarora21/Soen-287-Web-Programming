function anagram()
			{
				var value="you have entered below mentioned string pairs.</br>";
				var flag=0;
				while(true) //infinite loop that takes 2 values from the user. 
				{
					var result=prompt("Enter the two words separated by comma").split(","); //input the values using prompt.
					if(result==-1) //if the user enters -1 then it will break the loop.
					{
						break;
					}
					if(isNaN(result[0])==false||isNaN(result[1])==false) //to check if the user enters a number
					{
						flag++; //flag variable to keep a count of number of wrong inputs.
						if(flag==5) //if the value of flag is 5 then it will print the error message and break the loop.
						{	
							value=value+" You have exceeded invalid entry limit.</br>"
							break;
						}
						continue; //continue the loop , it will not check the other conditions.
					}
					
					if(result[0].length!=result[1].length) //Primary condition to check if the words are anagrams or not . If the length is different then its not an anagram.
					{
						flag=0;
						value=value+"Pairs "+result[0]+" and "+result[1]+" are not anagram"+"</br>";
					}
					else //if both words have same length;
					{
						flag=0;
						//splitting both the words in character array
						var arr1=result[0].split(""); 
						var arr2=result[1].split("");
						var count=0;
						for(var i=0;i<arr1.length;i++) //for loop that iterates through all characters of first array.
						{
							for(var j=0;j<arr2.length;j++) //nested loop that iterates through all characters of second array.
							{
								if(arr1[i]===arr2[j]) //if both the characters are same.
								{
									arr2[j]=null; //assign the arr[j] to null so that it doesn't count itself twice.
									count++; //increasing the value of count by 1.
									break; //break the nested loop ,should not check any other character if matched.
								}
							}
						}
						if(count==arr1.length) //if the value of count is same as the value of array length, then its an anagram
						{
							value=value+"Pairs "+result[0]+" and "+result[1]+" are anagram"+"</br>";
						}
						else //else its not an anagram
						{
							value=value+"Pairs "+result[0]+" and "+result[1]+" are not anagram"+"</br>";
						}
					}
				}
				document.getElementById("statsOut").innerHTML=value; //print all the results.
				
		}
		anagram(); //calling the function.