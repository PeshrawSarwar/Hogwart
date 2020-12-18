const search = document.getElementById("search");
const matchList = document.getElementById("match-list");

// search data.json and filter it

const searchMembers = async (searchText) => {
  const res = await fetch("data.json");
  const members = await res.json();

  // get matches to current text input

  let matches = members.filter((member) => {
    const regex = new RegExp(`^${searchText}`, "gi");
    return member.name.match(regex);
  });

  if (searchText.length === 0) {
    matches = [];
    matchList.innerHTML = "";
  }

  outputHtml(matches);
};

// show results in HTML

const outputHtml = (matches) => {
  if (matches.length > 0) {
    const html = matches
      .map(
        (match) => `
        <div class="container">
            <div class="card" style="width: ;">
                <img class="card-img-top" src="${match.image}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">${match.name} <small>species : ${match.species}</small></h5>
                    <small>${match.gender}</small> <p class="text-primary">${match.dateOfBirth}</p>
                    <p class="card-text"><h5 class="text-primary">${match.house}</h5> <span clss="text-warning">ancestry : ${match.ancestry}</span></p>
                    <p class="card-text"><span class="text-info">eyeColour : ${match.eyeColour}</span> -- <span class="text-success">HairColour : ${match.hairColour}</span></p>

                    <h6 class="text-danger">
                        Wand-wood : ${match.wand.wood} <br> Wand-core : ${match.wand.core} <br> Wand-length : ${match.wand.length}
                    </h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">patronus : ${match.patronus}</li>
                    <li class="list-group-item">hogwartsStudent : ${match.hogwartsStudent}</li>
                    <li class="list-group-item">hogwartsStaff : ${match.hogwartsStaff}</li>
                    <li class="list-group-item">actor : ${match.actor}</li>
                    <li class="list-group-item">alive : ${match.alive}</li>
                </ul>
            </div>
        
        </div>
        
        
        `
      )
      .join("");

    matchList.innerHTML = html;
  }
};

search.addEventListener("input", () => searchMembers(search.value));
