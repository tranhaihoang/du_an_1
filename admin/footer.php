</div>


    <script>
        let link = document.querySelectorAll(".act-list")

        link.forEach(element => {
            element.onclick = () => {
                link.forEach(nav => {
                    nav.classList.remove("sidebar-text-thin");
                })
                element.classList.add("sidebar-text-thin");
            }
        })



        let close = document.querySelector(".delete")
        let menu = document.querySelector(".sidebar")
        let bar = document.querySelector("span.bar")
        let icon = document.querySelector("span.bar i")
        bar.onclick = () => {
            menu.classList.toggle("off")
        let isIcon = menu.classList.contains('off')
        icon.classList = isIcon ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'
            close.style.display = "block"
        }

        close.onclick = () => {
            menu.classList.toggle("off")
            let isIcon = menu.classList.contains('off')
            icon.classList = isIcon ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'
            close.style.display = "none"

        }



    </script>

</body>

</html>