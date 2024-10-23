"use strict";

// Menu scripts
const /** {NodeList} */ $accourdions = document.querySelectorAll("[data-accordion]");
/** 
* @param {NodeList} $element Accourdion node
*
  */
const inintAccordion = function ($element){
  const /** {NodeList} */ $button = $element.querySelector("[data-accordion-btn]");
  let isExpanded = false;
  $button.addEventListener("click", function () {
    isExpanded =isExpanded ? false : true;
    this.setAttribute("aria-expanded", isExpanded);
  });
}
for(const $accourdion of $accourdions) inintAccordion($accourdion);
// bộ lọc cho mobile
function addEventOnElements(elements, eventType, callback) {
    elements.forEach(element => {
        element.addEventListener(eventType, callback);
    });
}

const $filterBar=document.querySelector("[data-filter-bar]");
const $filterTogglers=document.querySelectorAll("[data-filter-toggler]");
const $overlay = document.querySelector("[data-overlay]");
addEventOnElements($filterTogglers, "click",function () {
    $filterBar.classList.toggle("active");
    $overlay.classList.toggle("active");
    const bodyOverflow = document.body.style.overflow;
    document.body.style.overflow = bodyOverflow === "hidden" ? "visible" :
    "hidden";  
});
// bộ lọc submit và clear (ok và xóa)
const /** {NodeElement} */ $filterSubmit = document.querySelector("[data-filter-submit]");
const  /** {NodeElement} */ $filterClear = document.querySelector("[data-filter-clear]");
const  /** {NodeElement} */ $filterSearch = document.querySelector("input[type='search']");
$filterSubmit.addEventListener("click",function (){
    const /** {NodeList}  */ $filterCheckboxes = $filterBar.querySelectorAll("input:checked");
    const /** Array */ queries = [];
    if ($filterSearch.value) queries.push(["q", $filterSearch.value]);
    if ($filterCheckboxes.length){
        for(const $checkbox of $filterCheckboxes){
            const /** {String} */ key =$checkbox.parentElement.parentElement.dataset.filter;
            queries.push([key, $checkbox.value]);
        }
    }
    window.location = queries.length ? `?${queries.join("&").replace(/,/g,"=")}` : "/menus.html";
    
});

$filterSearch.addEventListener("keydown", e => {
    if( e.key === "Enter" )$filterSubmit.click(); 
});

$filterClear.addEventListener("click",function (){
    const /** {nodelist} */ $filterCheckboxes = $filterBar.querySelectorAll("input:checked");
    $filterCheckboxes?.forEach(elem => elem.checked=false);
    $filterSearch.value &&= "";
});
const /** String */ queryStr = window.location.search.slice(1);
const /** Array */ queries = queryStr && queryStr.split("&").map(i=> i.split("="));
const /** NodeElement */ $filterCount = document.querySelector("[data-filter-count]");

if(queries.length){
    $filterCount.style.display = "block";
    $filterCount.innerHTML = queries.length;
}
else{
    $filterCount.style.display = "none";
}
queryStr && queryStr.split("&").map(i=>{
    if(i.split("=")[0] =="q"){
        $filterBar.querySelector("input[type='search']").value = i.split("=")[1].replace(/%20/g, "");
    }else{
        $filterBar.querySelector(`[value="${i.split("=")[1].replace(/%20/g, "")}"]`).checked = true;
    }

});
const /** {nodeElement} */ $filterBtn = document.querySelector("[data-filter-btn");
window.addEventListener("scroll", e=>{
    $filterBtn.classList[window.scrollY >= 800 ? "add" : "remove"]("active");
});
// // 
// const /** {NodeElement} */ $grisList = document.querySelector("[data-grid-list]");
// const /** {NodeElement} */ $loadMore = document.querySelector("[data-load-more]");
// const /** {Array} */ $defaultQueries = [
//     ["mealType","breakfast"],
//     ["mealType","dinner"],
//     ["mealType","lunch"],
//     ["mealType","snack"],
//     ["mealType","teatime"],
//     ...cardQueries
// ];
// $grisList.innerHTML = "";