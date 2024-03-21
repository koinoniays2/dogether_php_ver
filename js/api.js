import searchPlaces from "./map.js";

window.addEventListener("load", function () {
  const params = new URLSearchParams(window.location.search);
  const clickedDataId = params.get("dataId");
  const searchInput = document.querySelector("#keyword");
  // 카테고리
  const categoryContainer = document.querySelector(".category");
  const content = document.querySelector(".content");
  // 페이지네이션 버튼
  const pageContainer = document.querySelector(".page_container");
  const prevButton = document.getElementById("prev_button");
  const nextButton = document.getElementById("next_button");
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
      // ★ 데이터 불러오기(서울,대전,대구,부산,경상도,충청도,제주도,강원도,경기도,전라도) ★
      if (data) {
        seoul = cityData(data, addressName, "서울"); // ★ 서울 ★
        daejeon = cityData(data, addressName, "대전광역시", "대전"); //  ★ 대전 ★
        daegu = cityData(data, addressName, "대구광역시", "대구"); //  ★ 대구 ★
        busan = cityData(data, addressName, "부산광역시", "부산"); //  ★ 부산 ★
        gyeongsang = cityData(
          data,
          addressName,
          "경상남도",
          "경상북도",
          "울산광역시",
          "경남",
          "경북",
          "울산"
        ); //  ★ 경상도(경남,경북,울산) ★
        chungcheong = cityData(
          data,
          addressName,
          "충청남도",
          "충청북도",
          "충남",
          "충북"
        ); //  ★ 충청도(충남,충북) ★
        Jeju = cityData(data, addressName, "제주"); //  ★ 제주도 ★
        gangwon = cityData(data, addressName, "강원"); //  ★ 강원도 ★
        gyeonggi = cityData(
          data,
          addressName,
          "경기도",
          "인천",
          "세종",
          "경기"
        ); //  ★ 경기도(경기도, 인천, 세종) ★
        jeolla = cityData(
          data,
          addressName,
          "전라남도",
          "전라북도",
          "광주광역시",
          "전남",
          "전북",
          "광주"
        ); //  ★ 전라도(전남, 전북, 광주) ★

        // ★★★★★ 카테고리 버튼 이벤트 및 렌더링 ★★★★★
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
        for (let i = 0; i < array.length; i++) {
          let obj = array[i];
          let keys = Object.keys(obj); // 키 추출
          let value = obj[keys[0]]; // 값 추출

          // 데이터 값이 있는 배열만 랜더링(값이 배열이고 길이가 0보다 큰 경우 키 출력)
          if (Array.isArray(value) && value.length > 0) {
            let button = document.createElement("button");
            button.textContent = keys[0];
            categoryContainer.appendChild(button);
            for (let j = i; j < 1; j++) {
              render(value);
            }
            
            // 테스트 함수
            
            // 카테고리 클릭 시 실행될 함수
            button.addEventListener("click", () => {
              console.log(keys[0], value);
              // 모든 카테고리 버튼에 대해 활성 클래스를 추가

              // ★ 지도 value 설정 ★
              switch (clickedDataId) {
                case "병원":
                  searchInput.value = `${keys[0]} 동물병원`;
                  searchPlaces(searchInput.value);
                  break;
                case "미용":
                  searchInput.value = `${keys[0]} 애견미용`;
                  searchPlaces(searchInput.value);
                  break;
                case "음식점":
                  searchInput.value = `${keys[0]} 애견동반 음식점`;
                  searchPlaces(searchInput.value);
                  break;
                case "카페":
                  searchInput.value = `${keys[0]} 애견동반 카페`;
                  searchPlaces(searchInput.value);
                  break;
                case "숙소":
                  searchInput.value = `${keys[0]} 애견동반 숙소`;
                  searchPlaces(searchInput.value);
                  break;
                default:
                  searchInput.value = `${keys[0]} 애견동반`;
                  searchPlaces(searchInput.value);
                  break;
              }
              // ★ 렌더링 부분 ★
              // 렌더링 초기화
              render(value);
            });
          }
        }
      }
    } catch (error) {
      console.error("데이터를 불러오는 도중 에러가 발생했습니다:", error);
      if (error?.message.includes("Unexpected token")) data(food, "address");
    }
  };
  // 페이지네이션+렌더링
  function render(value) {
    // ★ 페이지 랜더링
    const itemsPage = 10; // 페이지당 표시 할 데이터 수
    let currentPage = 1; // 현재 페이지 번호
    const totalPages = Math.ceil(value.length / itemsPage); // 총 페이지 수 계산
    content.textContent = "";
    // 페이지를 렌더링하는 함수
    function renderPage() {
      const startIndex = (currentPage - 1) * itemsPage;
      const endIndex = startIndex + itemsPage;
      const currentData = value.slice(startIndex, endIndex);

      // 현재 페이지의 데이터출력
      content.innerHTML = "";
      currentData.forEach((item) => {
        let detailElement = createDetailElement(item);
        content.appendChild(detailElement);
      });
      // 페이지 버튼 업데이트
      renderPageButtons();
    }
    // 페이지 버튼 생성 함수
    function createPageButton(pageNumber) {
      const button = document.createElement("button");
      button.textContent = pageNumber;
      button.addEventListener("click", () => {
        currentPage = pageNumber; // 버튼에 리스너 걸어주기(현재페이지와 버튼숫자 동기화)
        renderPage();
      });
      return button;
    }
    // 페이지 버튼 렌더링
    function renderPageButtons() {
      pageContainer.innerHTML = ""; // 버튼 초기화(페이지마다 버튼 수가 다르기 때문에)
      // 버튼 수 조절
      const startPage = Math.max(currentPage - 5, 1);
      const endPage = Math.min(startPage + 9, totalPages);
      for (let i = startPage; i <= endPage; i++) {
        const button = createPageButton(i);
        pageContainer.appendChild(button);
        //  버튼활성화 함수
        if (i === currentPage) {
          button.style.backgroundColor = "#14471e";
          button.style.color = "white";
          button.style.fontWeight = "bold";
          button.style.borderRadius = "15px";
        }
      }
    }
    // 이전 페이지로 이동하는 함수
    function goToPrevPage() {
      if (currentPage > 1) {
        currentPage--;
        renderPage();
      }
    }
    // 다음 페이지로 이동하는 함수
    function goToNextPage() {
      if (currentPage < totalPages) {
        currentPage++;
        renderPage();
      }
    }
    // 이전 페이지 버튼에 이벤트 리스너 추가
    prevButton.addEventListener("click", goToPrevPage);
    // 다음 페이지 버튼에 이벤트 리스너 추가
    nextButton.addEventListener("click", goToNextPage);
    renderPage();
  }
  // ★ 렌더링 함수 ★
  function createDetailElement(item) {
    let flexDiv = document.createElement("div");
    let titleDiv = document.createElement("div");
    let textDiv = document.createElement("div");

    flexDiv.classList.add("detailflex");
    titleDiv.classList.add("detailtitle");
    textDiv.classList.add("detailList");

    if (item.FCLTY_NM || item.ldgs_nm) {
      let name = document.createElement("p");
      name.textContent = item.FCLTY_NM || item.ldgs_nm;
      titleDiv.appendChild(name);
    }

    if (item.LNM_ADDR || item.ldgs_addr) {
      let address = document.createElement("p");
      address.innerHTML = `<p style="font-size: 1.1rem; display: flex; align-items: center; color: gray"><i class="fa-solid fa-location-dot" style="color: #14471e; margin-right: 10px;"></i>주소</p> ${
        item.LNM_ADDR || item.ldgs_addr
      }`;
      textDiv.appendChild(address);
    }

    if (item.OPER_TIME || item.WORKDAY_OPER_TIME_DC) {
      let open = document.createElement("p");
      open.innerHTML = `<p style="font-size: 1.1rem; display: flex; align-items: center; color: gray"><i class="fa-solid fa-store" style="color: #14471e; margin-right: 5px;"></i>영업시간</p> ${
        item.OPER_TIME || item.WORKDAY_OPER_TIME_DC
      }`;
      textDiv.appendChild(open);
    }

    if (item.RSTDE_GUID_CN || item.WKEND_OPER_TIME_DC) {
      let closed = document.createElement("p");
      closed.innerHTML = `<p style="font-size: 1.1rem; display: flex; align-items: center; color: gray"><i class="fa-solid fa-store-slash" style="color: #14471e; margin-right: 5px;"></i>휴무일</p> ${
        item.RSTDE_GUID_CN || item.WKEND_OPER_TIME_DC
      }`;
      textDiv.appendChild(closed);
    }
    flexDiv.appendChild(titleDiv);
    flexDiv.appendChild(textDiv);

    return flexDiv;
  }
  // ★ 지역별 데이터 함수 ★
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
  // 지도 이벤트 버블링 방지
  document
    .getElementById("search_form")
    .addEventListener("submit", function (event) {
      event.preventDefault(); // 폼 제출 방지
      // var keyword = document.getElementById("keyword").value;
      searchPlaces(keyword);
    });
});
