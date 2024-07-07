
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

  </head>
<body>
  <section class="navigation">
    <div class="nav-container">
      <div class="brand">
        <a href="index.php">FIT FLOW</a>
      </div>
      <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
            <li>
              <a href="see_clients.php">Clients</a>
            </li>
            <li>
              <a href="meal-plans-modify.php">Meal Plans</a>
            </li>
            <li>
              <a href="workout-plans-modify.php">Workouts</a>
            </li>
            <li>
              <a href="account.php">Account</a>
            </li>
          </ul>
      </nav>
    </div>
  </section>

  <div style="padding-top: 80px;" class="grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell small-2 medium-2 large-1" style="padding-top: 25px; float: right;">
        <a style="font-size: 50px; color: black;" href="javascript:history.back()">&#8678</a>

      </div>
      <div class="cell small-10 medium-10 large-5">
          <li class="menu" style="padding-top: 20px;">
            <form style="width: 100%;" class="search-bar">
              <input type="text" placeholder="Search...">
              <button type="submit">Go</button>
            </form>
          </li>
      </div>
      <div class="cell small-6 medium-6 large-3" style="padding-top: 40px;">
        <label>
          <select>
            <option value="All Meals">All Meals</option>
            <option value="Breakfast">Breakfast</option>
            <option value="Lunch">Lunch</option>
            <option value="Dinner">Dinner</option>
            <option value="Snack">Snack</option>
          </select>
        </label>
      </div>
      <div class="cell small-6 medium-3 large-3" style="padding-top: 40px; float: right;">
        
<button id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">Filter by ingredients<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<!-- Dropdown menu -->
<div id="dropdownToggle" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-72 dark:bg-gray-700 dark:divide-gray-600">
    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownToggleButton">
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Avocado</span>
          </label>
        </div>
      </li>
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Beef</span>
          </label>
        </div>
      </li>
      <li>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Beans</span>
          </label>
        </div>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Chicken</span>
          </label>
        </div>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Cheese</span>
          </label>
        </div>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Eggs</span>
          </label>
        </div>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Fruit</span>
          </label>
        </div>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Oats</span>
          </label>
        </div>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Pasta</span>
          </label>
        </div>
        <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <label class="relative inline-flex items-center w-full cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Rice</span>
          </label>
        </div>
      </li>
    </ul>
</div>

      </div>
    </div>
  </div>
  <div class="grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>

      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>

      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>

      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>
      <div class="cell small-6 medium-4 large-3" style="padding:2%">
        <a href="recipe1.php"><img src="imgs/recipe-image-legacy-id-208452_11-6b900aa.webp"></a>
        <p class="recipe-name-list-to-add">Curried kale & chickpea soup</p>
        <div style="display: flex;
        justify-content: center;
        align-items: center;">
            <div class="add">
            <button class="round-6">&#10003</button>
            </div>
      </div>
      </div>


      

      <div class="container middle">
        <div class="pagination paginatie">
            <ul>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li class="active"><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
        </div>
      </div>
      
      
    </div>
  </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
