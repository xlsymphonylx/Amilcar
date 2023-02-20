let page = 1;
let data;
const regex = /\bPAGINA SIGUIENTE\b/;
async function main() {
  data = await getData(page);
  setDOMData(data);
}
function nextPage() {
  if (regex.test(data[0])) {
    page = 4;
  }
  page++;
  main(page);
}
function lastPage() {
  page--;
  main(page);
  if (page < 1) {
    page = 0;
  }
}
main(page);
