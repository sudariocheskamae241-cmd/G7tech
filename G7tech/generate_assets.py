from PIL import Image, ImageDraw, ImageFilter
import os

root = os.path.join('.', 'assets', 'images')
os.makedirs(root, exist_ok=True)

# hero-character.png
img = Image.new('RGBA', (900, 900), (17, 18, 26, 255))
d = ImageDraw.Draw(img)
for x, y, r, col in [
    (250, 160, 180, (108, 32, 255, 120)),
    (650, 620, 205, (21, 155, 255, 120)),
    (160, 620, 150, (255, 155, 66, 120)),
]:
    d.ellipse((x-r, y-r, x+r, y+r), fill=col)
for box in [(390, 150, 515, 330), (355, 225, 390, 300), (515, 220, 550, 300)]:
    d.ellipse(box, fill=(20, 20, 24, 255))
d.ellipse((310, 210, 590, 500), fill=(250, 212, 170, 255))
for box in [(332, 180, 560, 330), (350, 200, 525, 405), (500, 170, 610, 290)]:
    d.ellipse(box, fill=(20, 20, 23, 255))
for x in [385, 489]:
    d.ellipse((x-18, 300, x+18, 342), fill=(28, 27, 34))
d.arc((400, 350, 500, 410), start=210, end=330, fill=(160, 80, 80), width=4)
d.rounded_rectangle((290, 500, 610, 760), radius=40, fill=(96, 47, 202, 255))
for box in [(220, 500, 340, 660), (180, 560, 280, 620)]:
    d.rounded_rectangle(box, radius=25, fill=(117, 75, 222, 255))
for box in [(560, 500, 700, 635), (645, 455, 715, 565)]:
    d.rounded_rectangle(box, radius=26, fill=(131, 92, 247, 255))
for x, y in [(210, 635), (700, 470)]:
    d.ellipse((x-24, y-24, x+24, y+24), fill=(250, 212, 170, 255))
d.rounded_rectangle((635, 500, 795, 640), radius=18, fill=(34, 38, 46, 255))
for x1, y1, x2, y2 in [(643, 500, 788, 530), (650, 535, 780, 550)]:
    d.rounded_rectangle((x1, y1, x2, y2), radius=10, fill=(21, 155, 255, 255))
mask = Image.new('RGBA', img.size, (0, 0, 0, 0))
mask_draw = ImageDraw.Draw(mask)
mask_draw.rounded_rectangle((690, 560, 760, 620), radius=12, fill=(255, 155, 66, 255))
img = Image.alpha_composite(img, mask)
for x in [365, 463]:
    d.ellipse((x-8, 320, x+8, 336), fill=(255, 255, 255))
for i in range(6):
    x = 345 + i * 38
    d.rounded_rectangle((x, 540, x + 12, 710), radius=8, fill=(138, 105, 255, 220))
img = img.filter(ImageFilter.GaussianBlur(0.5))
img.save(os.path.join(root, 'hero-character.png'))

# about-character.jpg
img2 = Image.new('RGB', (800, 820), (20, 22, 30))
d2 = ImageDraw.Draw(img2)
for x, y, r, col in [(170, 170, 120, (108, 32, 255)), (620, 180, 150, (21, 155, 255)), (620, 610, 150, (184, 255, 0))]:
    d2.ellipse((x-r, y-r, x+r, y+r), fill=col)
d2.rounded_rectangle((210, 260, 590, 705), radius=40, fill=(108, 32, 255))
d2.ellipse((255, 135, 545, 420), fill=(252, 208, 170))
for box in [(250, 120, 550, 300), (290, 90, 510, 200)]:
    d2.ellipse(box, fill=(22, 22, 26))
for i in range(5):
    x = 270 + i * 60
    d2.rounded_rectangle((x, 360, x + 16, 680), radius=8, fill=(145, 104, 255))
for x in [345, 455]:
    d2.ellipse((x-13, 260, x+13, 296), fill=(30, 30, 34))
d2.arc((340, 315, 465, 380), start=210, end=330, fill=(160, 80, 80), width=4)
img2.save(os.path.join(root, 'about-character.jpg'), quality=88)

# showreel.jpg
img3 = Image.new('RGB', (1200, 700), (15, 18, 22))
d3 = ImageDraw.Draw(img3)
d3.rectangle((0, 0, 1200, 700), fill=(12, 16, 22))
d3.ellipse((120, 100, 1080, 600), fill=(27, 32, 38))
d3.rounded_rectangle((80, 140, 1120, 560), radius=26, fill=(17, 18, 24))
cx, cy = 600, 350
for r, col in [(120, (184, 255, 0)), (100, (255, 255, 255))]:
    d3.ellipse((cx-r, cy-r, cx+r, cy+r), fill=col)
triangle = [(cx-18, cy-34), (cx-18, cy+34), (cx+32, cy)]
d3.polygon(triangle, fill=(18, 18, 22))
for x, h, col in [(240, 200, (108, 32, 255)), (470, 245, (21, 155, 255)), (760, 195, (255, 155, 66)), (970, 210, (184, 255, 0))]:
    d3.rounded_rectangle((x, 360-h, x+90, 420), radius=24, fill=col)
d3.rounded_rectangle((300, 470, 900, 530), radius=16, fill=(32, 35, 41))
for i in range(8):
    x = 330 + i * 70
    d3.rounded_rectangle((x, 488, x + 34, 515), radius=8, fill=(16, 17, 20))
img3.save(os.path.join(root, 'showreel.jpg'), quality=90)

# project images
project_palette = [
    ('project1.jpg', (22, 27, 38), (184, 255, 0), (108, 32, 255)),
    ('project2.jpg', (20, 22, 31), (21, 155, 255), (255, 155, 66)),
    ('project3.jpg', (14, 18, 24), (255, 92, 97), (108, 32, 255)),
    ('project4.jpg', (18, 19, 26), (184, 255, 0), (21, 155, 255)),
]
for name, bg, accent, accent2 in project_palette:
    imgp = Image.new('RGB', (800, 900), bg)
    dp = ImageDraw.Draw(imgp)
    for x, y, r, col in [(180, 180, 180, accent), (600, 200, 170, accent2), (300, 620, 180, (255, 255, 255))]:
        dp.ellipse((x-r, y-r, x+r, y+r), fill=col)
    if 'project1' in name:
        dp.rounded_rectangle((180, 250, 620, 700), radius=36, fill=(243, 115, 78))
        dp.rectangle((240, 320, 560, 620), fill=(255, 255, 255))
        dp.polygon([(320, 250), (520, 250), (420, 100)], fill=(184, 255, 0))
    elif 'project2' in name:
        dp.rectangle((220, 260, 600, 680), fill=(21, 155, 255))
        dp.ellipse((260, 220, 560, 500), fill=(248, 201, 106))
        dp.polygon([(230, 650), (410, 420), (590, 650)], fill=(102, 54, 179))
    elif 'project3' in name:
        dp.polygon([(140, 700), (420, 160), (680, 700)], fill=(108, 32, 255))
        dp.ellipse((400-170, 450-170, 400+170, 450+170), fill=(255, 255, 255))
        dp.rectangle((300, 320, 500, 560), fill=(255, 92, 97))
    else:
        dp.rounded_rectangle((150, 200, 660, 700), radius=30, fill=(184, 255, 0))
        dp.ellipse((250, 250, 550, 550), fill=(21, 155, 255))
        dp.polygon([(250, 730), (420, 430), (590, 730)], fill=(255, 155, 66))
    imgp.save(os.path.join(root, name), quality=90)

print('Assets generated successfully.')
