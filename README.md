# Project-Carplan

**Project-Carplan** เป็นโปรเจคที่พัฒนาขึ้นสำหรับการวางแผนการเดินรถของบริษัทตาตงนครสวรรค์ ซึ่งเป็นโปรเจคที่ทำขึ้นในช่วงฝึกงานสหกิจที่บริษัทตาราง โดยมีฟังก์ชันที่รองรับการเพิ่ม ลบ แก้ไขข้อมูลต่างๆ เช่น น้ำหนักตะกร้า, เบี้ยเลี้ยง, ภาค, ลูกค้า, สินค้า, รถ, เส้นทาง และข้อมูลพนักงาน ซึ่งถูกนำมาจัดแผนและออกบิลในรูปแบบ PDF

## Table of Contents
1. [Technologies Used](#technologies-used)
2. [Features](#features)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Contributing](#contributing)
6. [License](#license)

## Technologies Used

- **Backend:**
  - [Laravel](https://laravel.com/): PHP framework for building modern web applications
  - [MySQL](https://www.mysql.com/): Database management system used to store application data

- **Frontend:**
  - [Tailwind CSS](https://tailwindcss.com/): Utility-first CSS framework for building custom designs
  - [DaisyUI](https://daisyui.com/): A plugin for Tailwind CSS that adds ready-to-use UI components

## Features

- **Add, Edit, Delete Data:**
  - การเพิ่ม ลบ แก้ไขข้อมูลน้ำหนักตะกร้า, เบี้ยเลี้ยง, ภาค, ลูกค้า, สินค้า, รถ, และเส้นทาง

- **Employee Data Integration:**
  - นำข้อมูลพนักงานจากโปรแกรมอื่นมาใช้งาน

- **Car Plan Creation:**
  - การจัดแผนเดินรถโดยใช้ข้อมูลทั้งหมดที่มี เช่น ลูกค้า, สินค้า, รถ, เส้นทาง ฯลฯ

- **PDF Generation:**
  - ออกบิลเป็น PDF โดยใช้ข้อมูลแผนเดินรถและรายละเอียดอื่นๆ

- **Responsive UI:**
  - ใช้ [Tailwind CSS](https://tailwindcss.com/) และ [DaisyUI](https://daisyui.com/) เพื่อออกแบบหน้าเว็บให้สวยงามและใช้งานได้ง่าย

## Installation

### 1. Clone this repository:
```bash
git clone https://github.com/yourusername/Project-Carplan.git
cd Project-Carplan
