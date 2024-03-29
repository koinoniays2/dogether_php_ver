// 페이지 로드 시 애니메이션을 실행
window.addEventListener("load", () => {
  // 섹션-1 애니메이션
  // 메인 타이틀 셋타임아웃 설정
  const section1Event = document.getElementById("section1-event");
  const section1Event2 = document.getElementById("section1-event2");

  setTimeout(() => {
    section1Event.style.opacity = 1;
    setTimeout(() => {
      section1Event2.style.opacity = 1;
    }, 500);
  }, 500);
  // section1-event가 1초 뒤에 나타나도록 설정
  // section1-event가 나타난 후 1초 뒤에 section1-event2가 나타나도록 설정

  // 섹션-2 타이틀 효과, 마우스오버 효과
  animateSection2Title();
  animateSection2MouseOver();

  // 섹션-3 애니메이션
  animateSection3();
  // 창의 크기 변경 이벤트를 감지하여 애니메이션을 다시 실행합니다.(오류떠서 주석함)
});

// 섹션-2 타이틀 효과 함수
const section2TargetEvent = document.getElementById("section2-t-event");
function animateSection2Title() {
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
}
// 섹션-2 마우스오버효과 함수
const section2Events = document.querySelectorAll("#section2-event");
function animateSection2MouseOver() {
  // 각 section2-event에 대해 마우스 오버 이벤트 리스너를 추가합니다.
  section2Events.forEach((event, index) => {
    event.addEventListener("mouseover", () => {
      // 마우스가 올라간 요소 이외의 모든 section2-event 요소의 투명도를 0으로 설정합니다.
      section2Events.forEach((otherEvent, otherIndex) => {
        if (otherIndex !== index) {
          otherEvent.style.opacity = 0.2;
        }
      });
    });
    event.addEventListener("mouseout", () => {
      section2Events.forEach((otherEvent) => {
        otherEvent.style.opacity = 1;
      });
    });
    event.style.transition = "opacity 0.2s ease-in-out";
  });
}
// 섹션-3 차례대로 나타남 애니메이션 함수
gsap.registerPlugin(ScrollTrigger);
function animateSection3() {
  const section3Event = document.getElementById("section3-event");
  const textE1 = document.getElementById("section3-textE1");
  const textE2 = document.getElementById("section3-textE2");
  const textE3 = document.getElementById("section3-textE3");
  let tl = gsap.timeline({
    scrollTrigger: {
      trigger: section3Event,
      start: "top center",
      end: "bottom center",
      toggleActions: "play none none none",
    },
  });
  tl.from(section3Event, {
    opacity: 0,
    x: "-500px",
    duration: 1,
    ease: "power2.out",
  })
    .from(
      textE1,
      {
        opacity: 0,
        x: "500px",
        duration: 1,
        ease: "power2.out",
      },
      "-=0.3"
    )
    .from(
      textE2,
      {
        opacity: 0,
        x: "500px",
        duration: 1,
        ease: "power2.out",
      },
      "-=0.5"
    )
    .from(
      textE3,
      {
        opacity: 0,
        x: "500px",
        duration: 1,
        ease: "power2.out",
      },
      "-=0.5"
    );
}
