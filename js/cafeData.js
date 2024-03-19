const cafeData = () => {
  fetch("http://localhost/dogether_php_ver/json/cafe.json")
    .then((response) => response.json())
    .then((data) => {
      let cafesByRegionAndCategory = {}; // 지역 및 종류별 카페를 저장할 객체

      data?.forEach((item) => {
        let region = item.CTPRVN_NM; // 지역 이름 가져오기
        const category = item.CTGRY_THREE_NM; // 종류 가져오기

        // 지역 통합
        if (
          region === "광주광역시" ||
          region === "전라북도" ||
          region === "전라남도"
        ) {
          region = "광주";
        } else if (
          region === "경상북도" ||
          region === "경상남도" ||
          region === "울산광역시"
        ) {
          region = "경상도";
        } else if (region === "제주특별자치도") {
          region = "제주도";
        } else if (region === "서울특별시") {
          region = "서울";
        } else if (region === "대구광역시") {
          region = "대구";
        } else if (region === "부산광역시") {
          region = "부산";
        } else if (region === "대전광역시") {
          region = "대전";
        } else if (region === "충청북도" || region === "충청남도") {
          region = "충청도";
        } else if (
          region === "경기도" ||
          region === "인천광역시" ||
          region === "세종특별자치시"
        ) {
          region = "경기도";
        }

        if (!cafesByRegionAndCategory[region]) {
          // 해당 지역의 객체가 없으면 생성
          cafesByRegionAndCategory[region] = {};
        }

        if (!cafesByRegionAndCategory[region][category]) {
          // 해당 지역의 종류 객체가 없으면 생성
          cafesByRegionAndCategory[region][category] = [];
        }

        cafesByRegionAndCategory[region][category].push(item); // 해당 지역 및 종류의 카페 배열에 카페 추가
      });

      // 디테일 페이지에 지역 데이터 표시
      const contentElement = document.querySelector(".content");
      const regions = Object.keys(cafesByRegionAndCategory);
      const regionHTML = regions
        .map(
          (region) =>
            `<p><a href="#" class="region-link" data-region="${region}">${region}</a></p>`
        )
        .join("");
      contentElement.innerHTML = regionHTML;

      // 클릭한 지역에 해당하는 카페 데이터 표시
      const regionLinks = document.querySelectorAll(".region-link");
      regionLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
          event.preventDefault();
          const clickedRegion = event.target.dataset.region;
          const cafesInRegion = cafesByRegionAndCategory[clickedRegion];
          console.log(cafesInRegion); // 해당 지역의 카페 데이터 콘솔에 출력하거나 원하는 처리 수행
        });
      });
    })
    .catch((error) => {
      console.error("데이터를 불러오는 도중 에러가 발생했습니다:", error);
    });
};

cafeData();
