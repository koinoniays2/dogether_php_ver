const serviceKey = "b26f3923-0250-4ed3-8329-54b04f6af8a2";
window.addEventListener("load", function () {
    const params = new URLSearchParams(window.location.search);
    const clickedDataId = params.get("dataId");
    // console.log(clickedDataId); // param 확인
})
const foodData = async () => {
    try {
        const response = await fetch(
            `http://api.kcisa.kr/openapi/API_TOU_052/request?serviceKey=${serviceKey}`,
            {
            headers: {
                accept: "application/json",
            },
            }
        );
        const json = await response.json();
        // ★ 펫 동반 가능 데이터 ★ 
        let data = json?.response?.body?.items?.item?.filter((item) =>
            item?.information?.includes("동반 입장가능")
        );
        // console.log(data); // 480
        
        // 지역(서울,대전,대구,부산,경상도,충청도,제주도,강원도,경기도,전라도)
        // ★ 서울 ★ 
        let seoul = cityData(data, "서울");
        console.log("서울", seoul);
        //  ★ 대전 ★ 
        let daejeon = cityData(data, "대전광역시");
        console.log("대전", daejeon);
        //  ★ 대구 ★ 
        let daegu = cityData(data, "대구광역시");
        console.log("대구", daegu);
        //  ★ 부산 ★ 
        let busan = cityData(data, "부산광역시");
        console.log("부산", busan);
        //  ★ 경상도(경남,경북,울산) ★ 
        let gyeongsang = cityData(data, "경상남도", "경상북도", "울산광역시");
        console.log("경상도", gyeongsang);
        //  ★ 충청도(충남,충북) ★ 
        let chungcheong = cityData(data, "충청남도", "충청북도");
        console.log("충청도", chungcheong);
        //  ★ 제주도 ★ 
        let Jeju = cityData(data, "제주");
        console.log("제주도", Jeju);
        //  ★ 강원도 ★ 
        let gangwon = cityData(data, "강원");
        console.log("강원도", gangwon);
        //  ★ 경기도(경기도, 인천, 세종) ★ 
        let gyeonggi = cityData(data, "경기도", "인천", "세종");
        console.log("경기도", gyeonggi);
        //  ★ 전라도(전남, 전북, 광주) ★ 
        let jeolla = cityData(data, "전라남도", "전라북도", "광주광역시");
        console.log("전라도", jeolla);
        } catch (error) {
        console.error("데이터를 불러오는 도중 에러가 발생했습니다:", error);
        if (error?.message.includes("Unexpected token")) foodData();
        }
    };
foodData();
// ★ 지역별 데이터 함수
const cityData = (data, areaName, ...rest) => {
    if(rest.length > 0) {
        const result = [];
        for (const term of [areaName, ...rest]) {
            for (const item of data) {
                if (item.address.includes(term)) {
                    result.push(item);
                }
            }
        }
        return result;
    }else {
        return data?.filter((item) => {
            return item?.address?.includes(areaName);
        })
    }
}