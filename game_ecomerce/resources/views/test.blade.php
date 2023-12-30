<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <select id="city">
        <option value="" selected>Chọn tỉnh thành</option>           
        </select>
                  
        <select id="district">
        <option value="" selected>Chọn quận huyện</option>
        </select>
        
        <select id="ward">
        <option value="" selected>Chọn phường xã</option>
        </select>
         </div> 
        
        
                <h2 id="result"></h2>
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
        <script>
            const host = "https://provinces.open-api.vn/api/";
            var callAPI = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data, "city");
                    });
            }
            callAPI('https://provinces.open-api.vn/api/?depth=1');
            var callApiDistrict = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.districts, "district");
                    });
            }
            var callApiWard = (api) => {
                return axios.get(api)
                    .then((response) => {
                        renderData(response.data.wards, "ward");
                    });
            }
            
            var renderData = (array, select) => {
                let row = ' <option disable value="">Chọn</option>';
                array.forEach(element => {
                    row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
                });
                document.querySelector("#" + select).innerHTML = row
            }
        
            $("#city").change(() => {
                callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
            });
            $("#district").change(() => {
                callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
            });
    
        </script>
</body>
</html>