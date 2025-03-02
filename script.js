// Navigation menu toggle
const navSlide = () => {
    const burger = document.querySelector(".burger")
    const nav = document.querySelector(".nav-links")
    const navLinks = document.querySelectorAll(".nav-links li")
  
    burger.addEventListener("click", () => {
      nav.classList.toggle("nav-active")
      burger.classList.toggle("burger-active")
  
      navLinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = ""
        } else {
          link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`
        }
      })
    })
  }
  
  navSlide()
  
  // Filter functionality
  const filterButtons = document.querySelectorAll(".filter-btn")
  
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const filter = button.getAttribute("data-filter")
      const items = document.querySelectorAll(".notice-item, .lost-found-item")
  
      filterButtons.forEach((btn) => btn.classList.remove("active"))
      button.classList.add("active")
  
      items.forEach((item) => {
        if (filter === "all" || item.classList.contains(filter)) {
          item.style.display = "block"
        } else {
          item.style.display = "none"
        }
      })
    })
  })
  
  // Modal functionality
  const noticeModal = document.getElementById("notice-modal")
  const itemModal = document.getElementById("item-modal")
  const addNoticeBtn = document.getElementById("add-notice-btn")
  const addItemBtn = document.getElementById("add-item-btn")
  const closeBtns = document.querySelectorAll(".close")
  
  if (addNoticeBtn) {
    addNoticeBtn.onclick = () => (noticeModal.style.display = "block")
  }
  
  if (addItemBtn) {
    addItemBtn.onclick = () => (itemModal.style.display = "block")
  }
  
  closeBtns.forEach((btn) => {
    btn.onclick = () => {
      if (noticeModal) noticeModal.style.display = "none"
      if (itemModal) itemModal.style.display = "none"
    }
  })
  
  window.onclick = (event) => {
    if (event.target == noticeModal) {
      noticeModal.style.display = "none"
    }
    if (event.target == itemModal) {
      itemModal.style.display = "none"
    }
  }
  
  // Login tab functionality
  const authTabs = document.querySelectorAll(".auth-tab")
  const authForms = document.querySelectorAll(".auth-form")
  
  authTabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const tabType = tab.getAttribute("data-tab")
  
      authTabs.forEach((t) => t.classList.remove("active"))
      tab.classList.add("active")
  
      authForms.forEach((form) => {
        if (form.id === `${tabType}-login-form`) {
          form.classList.remove("hidden")
        } else {
          form.classList.add("hidden")
        }
      })
    })
  })
  
  // Form submission (simulated)
  const noticeForm = document.getElementById("notice-form")
  const itemForm = document.getElementById("item-form")
  const loginForm = document.getElementById("login-form")
  const studentLoginForm = document.getElementById("student-login-form")
  const staffLoginForm = document.getElementById("staff-login-form")
  const registerForm = document.getElementById("register-form")
  
  if (noticeForm) {
    noticeForm.addEventListener("submit", (e) => {
      e.preventDefault()
      const title = document.getElementById("notice-title").value
      const content = document.getElementById("notice-content").value
      const type = document.getElementById("notice-type").value
  
      // Simulated notice creation (replace with actual API call)
      createNotice(title, content, type)
      noticeModal.style.display = "none"
      noticeForm.reset()
    })
  }
  
  if (itemForm) {
    itemForm.addEventListener("submit", (e) => {
      e.preventDefault()
      const name = document.getElementById("item-name").value
      const description = document.getElementById("item-description").value
      const type = document.getElementById("item-type").value
      const image = document.getElementById("item-image").files[0]
  
      // Simulated item report creation (replace with actual API call)
      createLostFoundItem(name, description, type, image)
      itemModal.style.display = "none"
      itemForm.reset()
    })
  }
  
  if (studentLoginForm) {
    studentLoginForm.addEventListener("submit", (e) => {
      e.preventDefault()
      // Simulated student login (replace with actual API call)
      alert("Student login successful!")
      window.location.href = "index.html"
    })
  }
  
  if (staffLoginForm) {
    staffLoginForm.addEventListener("submit", (e) => {
      e.preventDefault()
      // Simulated staff login (replace with actual API call)
      alert("Staff login successful!")
      window.location.href = "index.html"
    })
  }
  
  if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
      e.preventDefault()
      // Simulated login (replace with actual API call)
      alert("Login successful!")
      window.location.href = "index.html"
    })
  }
  
  if (registerForm) {
    registerForm.addEventListener("submit", (e) => {
      e.preventDefault()
      // Simulated registration (replace with actual API call)
      alert("Registration successful!")
      window.location.href = "login.html"
    })
  }
  
  // Simulated data creation functions (replace with actual API calls)
  function createNotice(title, content, type) {
    const noticeList = document.querySelector(".notice-list")
    const noticeItem = document.createElement("div")
    noticeItem.classList.add("notice-item", type)
    noticeItem.innerHTML = `
          <h3>${title}</h3>
          <p>${content}</p>
          <span class="notice-type">${type}</span>
      `
    noticeList.prepend(noticeItem)
  }
  
  function createLostFoundItem(name, description, type, image) {
    const itemList = document.querySelector(".lost-found-list")
    const itemElement = document.createElement("div")
    itemElement.classList.add("lost-found-item", type)
    itemElement.innerHTML = `
          <h3>${name}</h3>
          <p>${description}</p>
          <span class="item-type">${type}</span>
      `
    if (image) {
      const reader = new FileReader()
      reader.onload = (e) => {
        const img = document.createElement("img")
        img.src = e.target.result
        img.alt = name
        img.style.maxWidth = "100%"
        itemElement.prepend(img)
      }
      reader.readAsDataURL(image)
    }
    itemList.prepend(itemElement)
  }
  
  