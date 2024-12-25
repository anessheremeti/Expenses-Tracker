function calculateAverages(totalIncome, totalExpenses, daysInPeriod) {
    const dailyIncome = totalIncome / daysInPeriod;
    const dailyExpenses = totalExpenses / daysInPeriod;

    return {
        dailyIncome: dailyIncome.toFixed(2),
        dailyExpenses: dailyExpenses.toFixed(2),
        monthlyIncome: (dailyIncome * 30).toFixed(2),
        monthlyExpenses: (dailyExpenses * 30).toFixed(2),
        yearlyIncome: (dailyIncome * 365).toFixed(2),
        yearlyExpenses: (dailyExpenses * 365).toFixed(2),
    };
}

function openModal() {
    const totalIncome = parseFloat(document.querySelector('.income').innerText.replace('$', ''));
    const totalExpenses = parseFloat(document.querySelector('.expenses').innerText.replace('$', ''));
    const averages = calculateAverages(totalIncome, totalExpenses, 30);

    document.getElementById('daily-average').innerText = `Daily Average: Income $${averages.dailyIncome}, Expenses $${averages.dailyExpenses}`;
    document.getElementById('monthly-average').innerText = `Monthly Average: Income $${averages.monthlyIncome}, Expenses $${averages.monthlyExpenses}`;
    document.getElementById('yearly-average').innerText = `Yearly Average: Income $${averages.yearlyIncome}, Expenses $${averages.yearlyExpenses}`;

    document.getElementById('averageModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('averageModal').style.display = 'none';
}
