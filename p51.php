<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>String Manipulation Tool</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 20px;
}

.container {
  max-width: 700px;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  color: #333;
}

form {
  margin-top: 20px;
}

textarea,
select,
input {
  width: calc(100% - 20px);
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 4px;
  border: 1px solid #ddd;
}

button {
  width: 100%;
  padding: 10px;
  border-radius: 4px;
  border: none;
  background-color: hotpink;
  color: white;
  cursor: pointer;
}

button:hover {
  background-color: #FFC0CB;
}

.input-container {
  width: calc(50% - 10px);
  margin-right: 10px;
}
</style>
</head>
<body>
<div class="container">
<h2>String Manipulation Tool</h2>
<form method="post">
<textarea name="user_string" placeholder="Enter your string here..."></textarea>
<div class="input-container">
<select name="operation">
<option value="length">Calculate Length of String</option>
<option value="case_convertl">Convert to Lowercase</option>
<option value="case_convertu">Convert to Uppercase</option>
<option value="white_spaces">Calculate White Spaces</option>
<option value="word_count">Calculate Words, Lines, and Characters</option>
<option value="find_word">Find Position of Specific Word</option>
<option value="replace_word">Replace Word</option>
<option value="vowel_count">Calculate Occurrence of Vowels</option>
</select>
</div>
<div class="input-container">
<input type="text" name="word_to_find" placeholder="Word to Find"> <!-- New input field for Find Word -->
<input type="text" name="word_to_replace" placeholder="Word to Replace"> <!-- New input field for Replace Word -->
<input type="text" name="replacement_word" placeholder="Replacement Word"><!-- New input field for Replacement Word -->
</div>
<button type="submit">Perform Operation</button>
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_string = $_POST['user_string'];
        $operation = $_POST['operation'];
        switch ($operation) {
        case 'length':
            $length = strlen($user_string);
            echo "The length of the string is: $length";
            break;
        
        case 'case_convertl':
            $lower = strtolower($user_string);
            echo "Lowercase: $lower";
            break;

        case 'case_convertu':
            $upper = strtoupper($user_string);
            echo "Uppercase: $upper";
            break;

        case 'white_spaces':
            $white_spaces = substr_count($user_string, ' ');
            echo "Number of white spaces: $white_spaces";
            break;

        case 'word_count':
            $wordCount = str_word_count($user_string);
            $lineCount = substr_count($user_string, "\n") + 1;
            $charCount = strlen($user_string);
            echo "<p><strong>Words:</strong> $wordCount</p>";
            echo "<p><strong>Lines:</strong> $lineCount</p>";
            echo "<p><strong>Characters:</strong> $charCount</p>";
            break;

        case 'find_word':
            $word_to_find = $_POST['word_to_find'];
            $position = strpos($user_string, $word_to_find);
            if ($position !== false) {
            echo "The position of the word '$word_to_find' is: $position";
            } else {
            echo "The word '$word_to_find' was not found.";
            }
            break;

        case 'replace_word':
            $word_to_replace = $_POST['word_to_replace'];
            $replacement_word = $_POST['replacement_word'];
            $new_string = str_replace($word_to_replace, $replacement_word,
            $user_string); echo "New string: $new_string";
            break;

        case 'vowel_count':
            $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
            $vowel_count = 0;
            foreach ($vowels as $vowel) {
            $vowel_count += substr_count(($user_string), $vowel);
            }
            echo "Total number of vowels: $vowel_count";
            break;
            
        default:
            echo "Invalid operation.";
            break;
}}
?>
</div>
</body>
</html>
