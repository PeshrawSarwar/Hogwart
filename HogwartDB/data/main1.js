const matchList = document.getElementById("match-list");

const searchMembers = async () => {
  const res = await fetch("data.json");
  const members = await res.json();

  outputHtml(members);
};

const outputHtml = (members) => {
  if (members.length > 0) {
    const html = members
      .map(
        (members) => `
                <div class="col-md-3 mx-auto my-2" id="cont">
                    <div class="card">
                    <img class="card-img-top" src="${members.image}" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title"> <h3 id="mainName">${members.name}</h3> </h6> <small>species : ${members.species}</small>
                        <small>${members.gender}</small> <p class="text-primary">${members.dateOfBirth}</p>
                        <p class="card-text"><h5 class="text-primary">${members.house}</h5> <span clss="text-warning">ancestry : ${members.ancestry}</span></p>
                        <p class="card-text"><span class="text-info">eyeColour : ${members.eyeColour}</span> -- <span class="text-success">HairColour : ${members.hairColour}</span></p>
                   </div>
                   </div>
            </div>
              `
      )
      .join("");
    matchList.innerHTML = html;
  }
};
searchMembers();

// Search ---

let search = document.getElementById("search");

const searchMembers1 = async (searchText) => {
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

  outputHtml1(matches);
};

// show results in HTML

const outputHtml1 = (matches) => {
  if (matches.length > 0) {
    const html = matches
      .map(
        (match) => `
          <div class="col-md-4 mx-auto my-2" id="cont">
              <div class="card">
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
              </div>
          </div>
          
          
          `
      )
      .join("");

    matchList.innerHTML = html;
  }
};

search.addEventListener("input", () => searchMembers1(search.value));
