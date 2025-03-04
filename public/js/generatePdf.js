const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

(async () => {
    const plannerId = process.argv[2]; // รับ ID จาก command line

    // โหลด HTML จากไฟล์ที่ Laravel สร้าง
    const htmlFilePath = path.join(__dirname, `../../storage/app/pdf_template_${plannerId}.html`);
    const htmlContent = fs.readFileSync(htmlFilePath, 'utf8');

    const browser = await puppeteer.launch({ headless: "new" });
    const page = await browser.newPage();
    
    await page.setContent(htmlContent, { waitUntil: 'networkidle0' });

    // ปรับขนาดให้พอดีกับเนื้อหา
    await page.evaluate(() => {
        document.body.style.width = '1000px';  // กำหนดความกว้าง
        document.body.style.height = 'auto';
    });

    // บันทึกเป็นรูปภาพ PNG (สามารถเปลี่ยนเป็น 'jpeg' ได้)
    const imagePath = `storage/screenshots/planner-${plannerId}.png`;
    await page.screenshot({ path: imagePath, fullPage: true });

    await browser.close();
    console.log(`Screenshot Created: ${imagePath}`);
})();
