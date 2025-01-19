
let totalExpenses = 0;


const startDate = new Date(); 

function calculateExpenseAverages(totalExpenses) {
    const current = new Date();
    const currentMonth = current.getMonth(); 
    const currentYear = current.getFullYear();

    const monthsInPeriod = (currentYear - startDate.getFullYear()) * 12 
        + (currentMonth - startDate.getMonth() + 1);

    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    const dailyExpenses = totalExpenses / daysInMonth;
    const monthlyExpenses = totalExpenses / monthsInPeriod;
    const yearlyExpenses = monthlyExpenses * 12;

    return {
        dailyExpenses: dailyExpenses.toFixed(2),
        monthlyExpenses: monthlyExpenses.toFixed(2),
        yearlyExpenses: yearlyExpenses.toFixed(2),
    };
}

function addExpense(expense) {

    totalExpenses += expense;

    
    const averages = calculateExpenseAverages(totalExpenses);
    
    console.log("Updated Averages:", averages);
}

function openModal() {
    const totalExpenses = parseFloat(document.querySelector('.expenses').innerText.replace('$', ''));
    const averages = calculateExpenseAverages(totalExpenses);

    document.getElementById('daily-average').innerText = `Daily Average: Expenses $${averages.dailyExpenses}`;
    document.getElementById('monthly-average').innerText = `Monthly Average: Expenses $${averages.monthlyExpenses}`;
    document.getElementById('yearly-average').innerText = `Yearly Average: Expenses $${averages.yearlyExpenses}`;

    document.getElementById('averageModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('averageModal').style.display = 'none';
}
