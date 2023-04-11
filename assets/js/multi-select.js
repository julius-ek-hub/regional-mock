let selectedContainer;
let selected;
let picker;

let onChangeCallbacks = [];

function removeExam(id) {
  let selected_ids = (selected.value || "")
    .split(",")
    .filter((_id) => _id != id);
  selected.value = selected_ids.join(",");
}

function selectMultiple(element) {
  let selected_ids = (selected.value || "").split(",").filter((id) => id);
  if (selected_ids.includes(element.value) || !element.value) return;
  selected_ids.push(element.value);
  selected.value = selected_ids.join(",");
  onChangeCallbacks.map((cb) => cb());
}

const showSelectedExams = () => {
  let selected_ids = (selected.value || "").split(",").filter((id) => id);
  selectedContainer.innerHTML = "";
  if (selected_ids.length == 0) {
    selectedContainer.innerHTML = '<div class = "error">None selected</div>';
    picker.value = "";
    return;
  }

  selected_ids.map((id) => {
    examName = picker.children[Number(id)].innerHTML;
    let examHolder = document.createElement("div");
    let deletedButton = document.createElement("button");
    deletedButton.textContent = "X";
    deletedButton.type = "button";
    deletedButton.onclick = () => {
      removeExam(id);
      onChangeCallbacks.map((cb) => cb());
    };
    examHolder.append(examName);
    examHolder.append(deletedButton);
    selectedContainer.appendChild(examHolder);
  });
};

onChangeCallbacks.push(showSelectedExams);

window.addEventListener("load", () => {
  selectedContainer = document.querySelector("#selected-container");
  selected = document.querySelector("#selected");
  picker = document.querySelector("#picker");
  onChangeCallbacks.map((cb) => cb());
});
