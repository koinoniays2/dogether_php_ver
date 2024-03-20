const serviceKey = "b26f3923-0250-4ed3-8329-54b04f6af8a2";
window.addEventListener("load", function () {
  const params = new URLSearchParams(window.location.search);
  const clickedDataId = params.get("dataId");
  // console.log(clickedDataId); // param 확인
  let food = "http://localhost/dogether_php_ver/json/food.json";
  let hotel = "http://localhost/dogether_php_ver/json/hotel.json";
  let etc = "http://localhost/dogether_php_ver/json/cafe.json";
  const data = async (api, apiType, addressName) => {
    try {
      const response = await fetch(api, {
        headers: {
          accept: "application/json",
        },
      });
      const json = await response.json();
      // ★ 음식 데이터 ★
      let data;
      let consoleName; // 콘솔 출력 구분하기위해(별 의미없는 데이터임!)
      if (apiType === "음식점") {
        consoleName = "음식점";
        data = json?.filter((item) => {
          return item?.PET_POSBL_AT?.includes("Y");
        });
        // console.log(data); // 480
      } else if (apiType === "호텔") {
        consoleName = "호텔";
        data = json?.filter((item) => {
          return item.pet_info_cn?.includes("반려동물 동반 가능");
        });
      } else if (apiType === "카페") {
        consoleName = "카페";
        data = json?.filter((item) => {
          return item.CTGRY_THREE_NM?.includes("카페");
        });
      } else if (apiType === "미용") {
        consoleName = "미용";
        data = json?.filter((item) => {
          return item.CTGRY_THREE_NM?.includes("미용");
        });
      } else if (apiType === "반려의료") {
        consoleName = "반려의료";
        data = json?.filter((item) => {
          return item.CTGRY_TWO_NM?.includes("반려의료");
        });
      } else if (apiType === "미술관") {
        consoleName = "미술관";
        data = json?.filter((item) => {
          return item.CTGRY_THREE_NM?.includes("미술관");
        });
      }
      let seoul,
        daejeon,
        daegu,
        busan,
        gyeongsang,
        chungcheong,
        Jeju,
        gangwon,
        gyeonggi,
        jeolla;
      // 지역(서울,대전,대구,부산,경상도,충청도,제주도,강원도,경기도,전라도)
      if (data) {
        // ★ 서울 ★
        seoul = cityData(data, addressName, "서울");
        // console.log(consoleName, "서울", seoul);
        //  ★ 대전 ★
        daejeon = cityData(data, addressName, "대전광역시", "대전");
        // console.log(consoleName, "대전", daejeon);
        //  ★ 대구 ★
        daegu = cityData(data, addressName, "대구광역시", "대구");
        // console.log(consoleName, "대구", daegu);
        //  ★ 부산 ★
        busan = cityData(data, addressName, "부산광역시", "부산");
        // console.log(consoleName, "부산", busan);
        //  ★ 경상도(경남,경북,울산) ★
        gyeongsang = cityData(
          data,
          addressName,
          "경상남도",
          "경상북도",
          "울산광역시",
          "경남",
          "경북",
          "울산"
        );
        // console.log(consoleName, "경상도", gyeongsang);
        //  ★ 충청도(충남,충북) ★
        chungcheong = cityData(
          data,
          addressName,
          "충청남도",
          "충청북도",
          "충남",
          "충북"
        );
        // console.log(consoleName, "충청도", chungcheong);
        //  ★ 제주도 ★
        Jeju = cityData(data, addressName, "제주");
        // console.log(consoleName, "제주도", Jeju);
        //  ★ 강원도 ★
        gangwon = cityData(data, addressName, "강원");
        // console.log(consoleName, "강원도", gangwon);
        //  ★ 경기도(경기도, 인천, 세종) ★
        gyeonggi = cityData(
          data,
          addressName,
          "경기도",
          "인천",
          "세종",
          "경기"
        );
        // console.log(consoleName, "경기도", gyeonggi);
        //  ★ 전라도(전남, 전북, 광주) ★
        jeolla = cityData(
          data,
          addressName,
          "전라남도",
          "전라북도",
          "광주광역시",
          "전남",
          "전북",
          "광주"
        );
        // console.log(consoleName, "전라도", jeolla);
        // 배열에 값이 존재하는 경우에만 카테고리 뿌리기
        let array = [
          { 서울: seoul },
          { 대전: daejeon },
          { 대구: daegu },
          { 부산: busan },
          { 경상도: gyeongsang },
          { 충청도: chungcheong },
          { 제주도: Jeju },
          { 강원도: gangwon },
          { 경기도: gyeonggi },
          { 전라도: jeolla },
        ];

        // ★ 카테고리 버튼 이벤트 ★
        let fristRend = false;
        const categoryContainer = document.querySelector(".category");
        const content = document.querySelector(".content");

        for (let i = 0; i < array.length; i++) {
          let obj = array[i];
          let keys = Object.keys(obj); // 키 추출
          let value = obj[keys[0]]; // 값 추출
          if (Array.isArray(value) && value.length > 0) {
            // 값이 배열이고 길이가 0보다 큰 경우 키 출력
            let button = document.createElement("button");
            button.textContent = keys[0];
            categoryContainer.appendChild(button);
            // 카테고리 클릭 시 실행될 함수
            button.addEventListener("click", () => {
              console.log(keys[0], value);
              content.textContent = "";
              content.textContent = keys[0];
              value.forEach((item) => {
                let flexDiv = document.createElement("div");
                let titleDiv = document.createElement("div");
                let textDiv = document.createElement("div");
                let name = document.createElement("h1");
                let address = document.createElement("p");
                let open = document.createElement("p");
                let closed = document.createElement("P");
                flexDiv.classList.add("detailflex");
                titleDiv.classList.add("detailtitle");
                textDiv.classList.add("detailList");
                name.textContent = item.FCLTY_NM || item.ldgs_nm;
                address.innerHTML = `<p style="font-size: 1.1rem; display: flex; align-items: center;"><i class="fa-solid fa-location-dot" style="color: #808080; margin-right: 10px;"></i>주소</p> ${
                  item.LNM_ADDR || item.ldgs_addr
                }`;

                open.innerHTML = `<p style="font-size: 1.1rem; display: flex; align-items: center; "><img src="./images/open.png" alt="" />영업시간</p> ${
                  item.OPER_TIME || item.WORKDAY_OPER_TIME_DC
                }`;
                closed.innerHTML = `<p style="font-size: 1.1rem; display: flex; align-items: center; "><img src="./images/closed.png" alt="" />휴무일</p> ${
                  item.RSTDE_GUID_CN || item.WKEND_OPER_TIME_DC
                }`;
                titleDiv.appendChild(name);
                textDiv.appendChild(address);
                textDiv.appendChild(open);
                textDiv.appendChild(closed);
                flexDiv.appendChild(titleDiv);
                flexDiv.appendChild(textDiv);
                content.appendChild(flexDiv);
              });
            });
            isFirstButtonClick = true;
            // ★ 맨처음 렌더링 ★
            if (!fristRend) {
              content.textContent = keys[0];
              fristRend = true;
            }
          }
        }
      }
    } catch (error) {
      console.error("데이터를 불러오는 도중 에러가 발생했습니다:", error);
      if (error?.message.includes("Unexpected token")) data(food, "address");
    }
  };
  // ★ 지역별 데이터 함수
  const cityData = (data, addressName, areaName, ...rest) => {
    if (rest.length > 0) {
      const result = [];
      for (const term of [areaName, ...rest]) {
        for (const item of data) {
          if (item?.[addressName]?.includes(term)) {
            result.push(item);
          }
        }
      }
      return result;
    } else {
      return data?.filter((item) => {
        return item?.[addressName]?.includes(areaName);
      });
    }
  };
  switch (clickedDataId) {
    case "음식점":
      data(food, "음식점", "CTPRVN_NM");
      break;
    case "카페":
      data(etc, "카페", "RDNMADR_NM");
      break;
    case "숙소":
      data(hotel, "호텔", "ctprvn_nm");
      break;
    case "미술관":
      data(etc, "미술관", "RDNMADR_NM");
      break;
    case "미용":
      data(etc, "미용", "RDNMADR_NM");
      break;
    case "병원":
      data(etc, "반려의료", "RDNMADR_NM");
      break;
    default:
      console.log("");
  }
});
