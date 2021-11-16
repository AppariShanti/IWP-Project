today=new Date();
currentMonth=today.getMonth();
currentYear=today.getFullYear();
selectMonth=document.querySelector('.cal-details-month');
selectYear=document.querySelector('.cal-details-year');
const Months=[
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

function changeMonth(mon,month_container)
{
    console.log("inside change month", mon);
    const new_month=document.createElement('p');
    new_month.textContent=Months[mon];
    console.log(new_month);
    //const month_container=document.querySelector('.cal-details-month');
    month_container.innerHTML="";
    month_container.appendChild(new_month);
}

function changeYear(yr,year_container)
{
    const new_year=document.createElement('p');
    new_year.textContent=yr;
    console.log(new_year);
    //const year_container=document.querySelector('.cal-details-year');
    year_container.innerHTML="";
    year_container.appendChild(new_year);
}

monthAndYear = document.querySelector(".content");

function showCalendar(month, year) 
{
    console.log(month);
    console.log(month,"+",year);
    let firstDay = (new Date(year, month)).getDay();

    tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";
    month_container=document.querySelector(".cal-details-month");
    //month_custom=document.querySelector(".custom-month");
    year_container=document.querySelector(".cal-details-year");
    //year_custom=document.querySelector(".custom-year");
    // filing data about month and in the page via DOM.
   changeMonth(month,month_container);
   changeYear(year,year_container);

    //selectYear.value = year;
    //selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                cell = document.createElement("td");
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth(month, year)) {
                break;
            }

            else {
                cell = document.createElement("td");
                cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-info");
                } // color today's date
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

}
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
    console.log("next clicked");
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}
showCalendar(currentMonth, currentYear);
document.querySelector(".cal-button-prev").addEventListener("click",previous);
document.querySelector(".cal-button-next").addEventListener("click", next);

//document.querySelector(".left-arrow").addEventListener("click",previous);
//document.querySelector(".right-arrow").addEventListener("click",next);


let month_list=document.querySelector(".month-list");
let cal=document.querySelector(".calender");
let month_sel=document.querySelector(".month-nav-bar");
let len=Months.length;
Months.forEach((e,index)=>
{
    console.log(e);
    let single_month=document.createElement("div");
    //let month_text=document.createTextNode(Months[i]);
    //single_month.appendChild(month_text);
    single_month.innerHTML=`<div data-month="${index}">${e}</div>`;
    single_month.querySelector("div").onclick=()=>{
        month_sel.classList.remove('show');
        month_list.classList.remove('show');
        cal.classList.remove("hidden");
        currentMonth=index;
        console.log(currentMonth);
        showCalendar(currentMonth,currentYear);

    }
    month_list.appendChild(single_month);
    
    
})

let month_picker=document.querySelector(".cal-details-month");
month_picker.onclick=()=>
{
    let cal=document.querySelector(".calender");
    cal.classList.add("hidden");
    month_list.classList.add("show");
    month_sel.classList.add("show");
}

let today_button=document.querySelector("#today-button");
today_button.onclick=()=>
{
    console.log("today button clicked");
    const t=new Date();
    currentMonth=today.getMonth();
    currentYear=today.getFullYear();
    showCalendar(currentMonth,currentYear);
}

let create_event=document.querySelector(".open-button");
create_event.onclick=()=>
{
    console.log("Hi");
    document.getElementById("myForm").style.display = "block";
    document.querySelector("main").classList.add("is-blurred");
    
}
let cancel_event=document.querySelector("#event_cancel");
cancel_event.onclick=()=>
{
    console.log("Hi");
    document.getElementById("myForm").style.display = "none";
    document.querySelector("main").classList.remove("is-blurred");
    
}



