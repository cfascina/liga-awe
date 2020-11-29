async function getChartData(cartolaId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getChartData.php',
        data: {
            id: cartolaId
        }
    });

    return result;
}

async function getMembers() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembers.php',
    });

    return result;
}

async function getMember(cartolaId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMember.php',
        data: {
            id: cartolaId
        }
    });

    return result;
}

async function getMostUsedScheme(cartolaId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMostUsedScheme.php',
        data: {
            id: cartolaId
        }
    });

    return result;
}

async function getPatrimony(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getPatrimony.php',
        data: {
            memberId: memberId
        }
    });

    return result;
}

async function getPointsAndRounds(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getPointsAndRounds.php',
        data: {
            memberId: memberId
        }
    });

    return result;
}
