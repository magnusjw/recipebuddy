<?php
/**
 * Created by PhpStorm.
 * Date: 18/11/2018
 * Time: 16:18
 */
include_once "headband.html";
?>
<body>

<h1>Create a Recipe</h1>
<hr/>

<h3 title="Title"> Title: </h3>
<input type="text" id="title" size="30"/>

<h3 title="Description"> Description: </h3>
<textarea rows="4" cols="50" placeholder="Add a Description"></textarea>

<h3 title="Difficulty"> Difficulty: </h3>

Select Difficulty:
<select id="difficulty">
    <option></option>
    <option>Easy</option>
    <option>Medium</option>
    <option>Hard</option>
</select>


<h3 title="Time"> Time: </h3>

<table>
    <tr>
        <th><input type="text" id="time" size = "30"/></th>
        <th><select id="timeUnit">
                <option></option>
                <option>Minutes</option>
                <option>Hours</option>
            </select></th>
    </tr>
</table>

<br>
<h3 title="Ingredients"> Ingredients: </h3>
<button type="button"> Add </button>

<table>
    <h3>Steps: </h3>
    <button type="button"> Add </button>
</table>

<h3 title="Add Picture">Add Picture:</h3>
<input type="file" id="myFile" multiple size="50" onchange="fileUploader()">

<p id="picture"></p>



<button type="submit" onsubmit="return createRecipe()">Create Recipe!</button>



</body>
