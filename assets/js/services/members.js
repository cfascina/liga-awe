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

async function getMemberAverage(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMemberAverage.php',
        data: {
            memberId: memberId
        }
    });

    return result;
}

async function getMemberChartData(cartolaId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMemberChartData.php',
        data: {
            id: cartolaId
        }
    });

    return result;
}

async function getMemberPatrimony(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMemberPatrimony.php',
        data: {
            memberId: memberId
        }
    });

    return result;
}

async function getMemberPoints(memberId) {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMemberPoints.php',
        data: {
            memberId: memberId
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

async function getMembersAveragePatrimony() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersAveragePatrimony.php'
    });

    return result;
}

async function getMembersAveragePoints() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersAveragePoints.php'
    });

    return result;
}

async function getMembersCount() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersCount.php'
    });

    return result;
}

async function getMembersFirstPlace() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersFirstPlace.php'
    });

    return result;
}

async function getMembersHighestScore() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersHighestScore.php'
    });

    return result;
}

async function getMembersLastPlace() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersLastPlace.php'
    });

    return result;
}

async function getMembersLowestScore() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersLowestScore.php'
    });

    return result;
}

async function getMembersRichiest() {
    const result = await $.ajax({
        type: 'GET',
        url: './api/members/getMembersRichiest.php'
    });

    return result;
}
/*************************/

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
