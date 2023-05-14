function renderCards() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    // console.log(this);
    let cardContainer = "";
    const response = JSON.parse(this.responseText);
    let t = "<table border='1px'>";
    t += "<tr>";
    t += "<th>";
    t += "Author";
    t += "</th>";
    t += "<th>";
    t += "Published";
    t += "</th>";
    t += "<th>";
    t += "Rating";
    t += "</th>";
    t += "</tr>";

    // for (let i = 0; i < response.length; i++) {
    //   //   t += "<tr>";
    //   //   t += "<td>";
    //   //   t += response[i].author;
    //   //   t += "</td>";
    //   //   t += "<td>";
    //   //   t += response[i].published;
    //   //   t += "</td>";
    //   //   t += "<td>";
    //   //   t += response[i].rating;
    //   //   t += "</td>";
    //   //   t += "</tr>";

    //   document.getElementById("data").appendChild = cardContainer;
    // }
    // console.log(response);

    response?.forEach((item) => {
      //   console.log({ item });
      cardContainer += ` 
<div class="card_container">
    <div class="card_image">
        <img id="pic"
            src="https://img.freepik.com/free-psd/live-streaming-influencer-social-media_1419-2416.jpg?w=740&t=st=1678662551~exp=1678663151~hmac=a7cb2c7482a6e08e77ffdb0e618ae8f856b2796e5234e9afe17d97b0a6ac51e1"
            alt="book">
    </div>

    <div class="card_body_details">
        <div class="card_body">
            <p><strong>Author:${item.author}</strong></p>
            <p><strong>Published:${item.published}</strong></p>
            <p><strong>Rating:${item.rating}</strong>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"></i>
            </p>
        </div>

        <div class="card_footer">
            <button><i class="fa-solid fa-play"></i>Play</button>
        </div>
    </div>
</div>
`;
    });
    // t += "</table>";
    document.getElementById("data").innerHTML = `
    <div class="card_wrapper">
    ${cardContainer}
    </div>
    `;
  };

  xhttp.open("GET", "./../../../Project/Controller/PodcastController.php");
  xhttp.send();
}

// setInterval(renderCards, 1000);
renderCards();
