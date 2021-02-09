export const getHeader = function (token = null) 
{
	const tokenData = JSON.parse(window.localStorage.getItem('vuex'))

	const headers = {
		'Accept': 'application/json',
		'Authorization': 'Bearer ' + tokenData.token
	}
	
	return headers
}