function Search() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    movies = document.getElementsByClassName("card u-clearfix");
    filter = input.value.toUpperCase();
    MovieName = document.getElementsByTagName("h2");
    for (i = 0; i < MovieName.length; i++) {
        a = MovieName[i];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            movies[i].style.display = "";
        } else {
            movies[i].style.display = "none";
        }
    }
}