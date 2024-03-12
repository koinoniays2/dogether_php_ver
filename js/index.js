// 섹션1 이벤트 효과

//  메인 타이틀 셋타임아웃 설정
const section1Event = document.getElementById("section1-event");
const section1Event2 = document.getElementById("section1-event2");

setTimeout(() => {
  section1Event.style.opacity = 1;
  setTimeout(() => {
    section1Event2.style.opacity = 1;
  }, 1000);
}, 1000);
// section1-event가 2초 뒤에 나타나도록 설정
// section1-event가 나타난 후 2초 뒤에 section1-event2가 나타나도록 설정

// 섹션2 이벤트 효과
// 섹션2타이틀 효과
const section2TargetEvent = document.getElementById("section2-t-event");

// IntersectionObserver를 설정합니다.
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        section2TargetEvent.style.opacity = 1;
      } else {
        section2TargetEvent.style.opacity = 0;
      }
    });
  },
  {
    root: null,
    rootMargin: "0px",
    threshold: 0.8, // 필요에 따라 이 임계값을 조절할 수 있습니다.
  }
);

observer.observe(section2TargetEvent);



// 섹션2 마우스오버효과
const section2Events = document.querySelectorAll("#section2-event");

// 각 section2-event에 대해 마우스 오버 이벤트 리스너를 추가합니다.
section2Events.forEach((event, index) => {
  event.addEventListener("mouseover", () => {
    // 마우스가 올라간 요소 이외의 모든 section2-event 요소의 투명도를 0으로 설정합니다.
    section2Events.forEach((otherEvent, otherIndex) => {
      if (otherIndex !== index) {
        otherEvent.style.opacity = 0;
      }
    });
  });
  event.addEventListener("mouseout", () => {
    section2Events.forEach((otherEvent) => {
      otherEvent.style.opacity = 1;
    });
  });
  event.style.transition = "opacity 0.3s ease-in-out";
});


// 섹션3 차례대로 나타남 효과주기
const section3TargetEvent = document.getElementById("section3-event");

// IntersectionObserver를 설정합니다.
const observer2 = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        section3TargetEvent.style.opacity = 1;
      } else {
        section3TargetEvent.style.opacity = 0;
      }
    });
  },
  {
    root: null,
    rootMargin: "0px",
    threshold: 0.8, // 필요에 따라 이 임계값을 조절할 수 있습니다.
  }
  
);
observer2.observe(section3TargetEvent);
