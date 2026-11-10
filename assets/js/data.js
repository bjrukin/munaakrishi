/**
 * Munaa Krishi Limited - Catalog, Content & Site Data
 * Extracted and formatted for vanilla HTML/JS usage without bundlers.
 */

const SITE_DATA = {
  name: 'Munaa Krishi',
  legalName: 'Munaa Krishi Limited',
  tagline: 'We Buy, We Sell, We Grow Together',
  phone: '+977-98031 65605',
  mobile: '+977-98031 65605',
  whatsapp: '+977-98031 65605',
  email: 'info@munaa.com.np',
  farmerEmail: 'munaabazar@gmail.com',
  address: 'Sanepa, Lalitpur, Nepal',
  registration: '232466/076/077',
  pan: '[PAN/VAT]',
  socials: {
    facebook: 'https://www.facebook.com/munaabazar',
    instagram: '',
    youtube: 'https://www.youtube.com/channel/UC9BHnImyXSO6p79Gxta9wsg',
    tiktok: ''
  }
};

const NOTICE_DATA = {
  enabled: true,
  id: 'marpha-apples-image-2083',
  title: 'Marpha apples are now available at all outlets',
  image: 'images/gallery/farmer-cutting-millet.jpg'
};

const HERO_SLIDES = [
  {
    id: 'value-chain',
    kicker: 'Munaa Krishi Limited',
    title: 'We Buy, We Sell, We Grow Together',
    text: 'A social enterprise and agribusiness initiative jointly envisioned by NRNA and the Government of Nepal.',
    image: 'images/farms/nepal-terrace-farm.jpg',
    imageAlt: 'Terraced agricultural fields in Nepal',
    primary: { label: 'See products', to: 'products.html' },
    secondary: { label: 'About Munaa', to: 'about.html' }
  },
  {
    id: 'farmers',
    kicker: 'Farmer partnership',
    title: 'Fair partnership with farmers',
    text: 'Munaa provides a buy-back guarantee for farmers and works on agricultural value chain development.',
    image: 'images/gallery/farmer-cutting-millet.jpg',
    imageAlt: 'A farmer working with a harvested crop',
    primary: { label: 'What we do', to: 'about.html' },
    secondary: { label: 'Contact us', to: 'contact.html' }
  },
  {
    id: 'outlets',
    kicker: 'Products and distribution',
    title: 'Safe, fresh, and quality products',
    text: 'Shop through Munaabazar Mart and outlets, online shopping, call on delivery, and international export.',
    image: 'images/gallery/farmer-cutting-millet.jpg',
    imageAlt: 'Agricultural products prepared for market',
    primary: { label: 'Find an outlet', to: 'outlets.html' },
    secondary: { label: 'View product categories', to: 'products.html' }
  }
];

const CATEGORIES = [
  { id: 'grains', name: 'Grains and Flour', image: 'images/products/rice-marsi.jpg', blurb: 'Marsi rice, phapar and kodo from the high hills' },
  { id: 'vegetables', name: 'Vegetables', image: 'images/products/greens-seasonal.jpg', blurb: 'Picked in Kavre and Bhaktapur every morning' },
  { id: 'fruits', name: 'Fruits', image: 'images/products/apple-mustang.jpg', blurb: 'Seasonal apples, oranges and kiwi' },
  { id: 'honey', name: 'Honey', image: 'images/products/honey-chiuri.jpg', blurb: 'Raw Chiuri and wildflower honey' },
  { id: 'dairy', name: 'Dairy and Cheese', image: 'images/products/chhurpi.jpg', blurb: 'Yak cheese, chhurpi and ghee' },
  { id: 'tea-spices', name: 'Tea and Spices', image: 'images/products/tea-ilam.jpg', blurb: 'Ilam tea, timur and hill turmeric' },
  { id: 'pickles-dried', name: 'Pickles and Dried', image: 'images/products/gundruk.jpg', blurb: 'Gundruk, sinki and homemade achar' }
];

const PRODUCTS = [
  {
    slug: 'jumla-marsi-rice',
    name: 'Jumla Marsi Red Rice',
    nepali: 'जुम्ला मार्सी चामल',
    categoryId: 'grains',
    district: 'Jumla',
    farmSlug: 'sinja-marsi-cooperative',
    image: 'images/products/rice-marsi.jpg',
    short: 'Nutty, slightly sweet red rice grown above 2,400 metres.',
    description: [
      'Marsi is a cold tolerant red rice grown on the high terraces of Sinja valley. The grains are unpolished, so they keep their red bran, natural fibre and nutty flavour.',
      'It takes a little longer to cook than white rice. Soak for 30 minutes and cook with one and a half times the water. It goes beautifully with dal, ghee and gundruk ko jhol.'
    ],
    season: 'New harvest',
    packSizes: '1 kg, 5 kg and 25 kg bags',
    storage: 'Keep in an airtight container in a cool, dry place. Best within 9 months.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur', 'pokhara', 'bharatpur'],
    featured: true
  },
  {
    slug: 'marpha-apple',
    name: 'Marpha Apple',
    nepali: 'मार्फा स्याउ',
    categoryId: 'fruits',
    district: 'Mustang',
    farmSlug: 'marpha-thakali-orchard',
    image: 'images/products/apple-mustang.jpg',
    short: 'Crisp, juicy apples from the dry Kali Gandaki valley.',
    description: [
      'Grown at 2,670 metres where cold nights and sunny days give the apples their crunch and sweetness. Picked by hand and graded at the orchard.',
      'Available from late Bhadra to Mangsir. Institutions can book 10 kg boxes in advance during the season.'
    ],
    season: 'Asoj harvest',
    packSizes: 'Sold per kg and in 10 kg boxes',
    storage: 'Refrigerate to keep crisp for up to 4 weeks.',
    outletIds: ['baneshwor', 'jhamsikhel', 'pokhara', 'bharatpur'],
    featured: true
  },
  {
    slug: 'chiuri-honey',
    name: 'Raw Chiuri Honey',
    nepali: 'चिउरी मह',
    categoryId: 'honey',
    district: 'Surkhet',
    farmSlug: 'bheri-mahila-mauri-samuha',
    image: 'images/products/honey-chiuri.jpg',
    short: 'Thick, pale winter honey from butter tree forests.',
    description: [
      'Collected by the women of Bheri Mahila Mauri Palan Samuha from log hives near Chiuri forests. The honey is cold extracted and never heated.',
      'Chiuri honey has a mild, buttery taste and crystallises slowly. If it does set, stand the jar in warm water for a few minutes.'
    ],
    packSizes: '250 g, 500 g and 1 kg glass jars',
    storage: 'Store at room temperature away from sunlight. Do not refrigerate.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur', 'pokhara', 'bharatpur'],
    featured: true
  },
  {
    slug: 'ilam-orthodox-tea',
    name: 'Ilam Orthodox Black Tea',
    nepali: 'इलाम चिया',
    categoryId: 'tea-spices',
    district: 'Ilam',
    farmSlug: 'kanyam-small-tea-growers',
    image: 'images/products/tea-ilam.jpg',
    short: 'Hand rolled first and second flush from Kanyam.',
    description: [
      'Made at the Kanyam smallholders’ shared factory from leaves plucked that same morning. The cup is bright and golden with a light muscatel note.',
      'Brew one teaspoon per cup with water just off the boil for three to four minutes. Lovely without milk.'
    ],
    packSizes: '100 g and 250 g packs',
    storage: 'Keep sealed and away from strong smells.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur', 'pokhara']
  },
  {
    slug: 'kavre-red-potato',
    name: 'Kavre Red Potato',
    nepali: 'काभ्रे रातो आलु',
    categoryId: 'vegetables',
    district: 'Kavrepalanchok',
    farmSlug: 'panauti-krishak-samuha',
    image: 'images/products/potato-red.jpg',
    short: 'Firm, waxy red potatoes, dug the day before.',
    description: [
      'The Panauti group grows red potatoes in rotation with maize and beans using vermicompost. They hold their shape well in aloo tama, achar and tarkari.',
      'Restaurants and hostels can order 25 kg sacks with next day delivery inside the valley.'
    ],
    season: 'Fresh this week',
    packSizes: 'Sold per kg and in 25 kg sacks',
    storage: 'Store in a dark, airy basket. Do not refrigerate.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur']
  },
  {
    slug: 'jumla-timur',
    name: 'Jumla Timur',
    nepali: 'जुम्लाको टिमुर',
    categoryId: 'tea-spices',
    district: 'Jumla',
    farmSlug: 'sinja-marsi-cooperative',
    image: 'images/products/timur-dried.jpg',
    short: 'Wild Himalayan pepper with a bright, tingling aroma.',
    description: [
      'Timur grows wild on the slopes around Sinja and is collected by cooperative members in Bhadra and Asoj. The seeds are removed by hand so you get only the fragrant husk.',
      'Use it in tomato achar, aloo ko achar or sprinkle over chatpate. A little goes a long way.'
    ],
    packSizes: '50 g and 100 g pouches',
    storage: 'Airtight jar, away from light. Grind just before use.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur', 'pokhara', 'bharatpur']
  },
  {
    slug: 'kalinchowk-gundruk',
    name: 'Kalinchowk Gundruk',
    nepali: 'कालिञ्चोक गुन्द्रुक',
    categoryId: 'pickles-dried',
    district: 'Dolakha',
    farmSlug: 'kalinchowk-aama-samuha',
    image: 'images/products/gundruk.jpg',
    short: 'Naturally fermented, sun dried mustard and radish leaves.',
    description: [
      'Made each winter by the Kalinchowk Aama Samuha in clay pots, then dried on bamboo nanglo in the mountain sun.',
      'Rinse and soak for ten minutes before making gundruk ko jhol or gundruk sadeko with onion, chilli and mustard oil.'
    ],
    packSizes: '200 g and 500 g packs',
    storage: 'Keep dry in a sealed jar. Lasts up to a year.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur', 'bharatpur']
  },
  {
    slug: 'langtang-chhurpi',
    name: 'Langtang Soft Chhurpi',
    nepali: 'लाङटाङ छुर्पी',
    categoryId: 'dairy',
    district: 'Rasuwa',
    farmSlug: 'langtang-chauri-palak',
    image: 'images/products/chhurpi.jpg',
    short: 'Soft, mild cheese made from chauri milk at 3,400 metres.',
    description: [
      'Made by herding families on the summer pastures of Langtang using only milk and a pinch of salt. Soft chhurpi is creamy and slightly tangy.',
      'Try it in chhurpi ko achar, in thukpa, or simply with Marsi rice and dal.'
    ],
    packSizes: '250 g and 500 g blocks',
    storage: 'Refrigerate and use within 10 days of opening.',
    outletIds: ['baneshwor', 'jhamsikhel', 'pokhara'],
    featured: true
  },
  {
    slug: 'mustang-phapar-flour',
    name: 'Mustang Phapar Flour',
    nepali: 'मुस्ताङ फापरको पिठो',
    categoryId: 'grains',
    district: 'Mustang',
    farmSlug: 'marpha-thakali-orchard',
    image: 'images/products/flour-buckwheat.jpg',
    short: 'Stone ground buckwheat flour, naturally gluten free.',
    description: [
      'Buckwheat grown by Marpha families in the winter months and ground at the village water mill. The flour is earthy and slightly bitter in the good way.',
      'Use it for phapar ko roti, dhindo or mixed with wheat flour for pancakes.'
    ],
    packSizes: '500 g and 1 kg packs',
    storage: 'Keep in an airtight container. Best within 6 months.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur', 'pokhara', 'bharatpur']
  },
  {
    slug: 'rayo-saag-seasonal-greens',
    name: 'Rayo Saag and Seasonal Greens',
    nepali: 'रायो साग तथा ताजा तरकारी',
    categoryId: 'vegetables',
    district: 'Kavrepalanchok',
    farmSlug: 'panauti-krishak-samuha',
    image: 'images/products/greens-seasonal.jpg',
    short: 'Mustard greens, radish and cauliflower picked every morning.',
    description: [
      'Harvested at dawn in Panauti and on our shelves by 7 AM. The mix changes with the season, so ask at the outlet what came in today.',
      'Schools and hostels can order a mixed 3 kg seasonal box for weekly delivery.'
    ],
    season: 'Picked daily',
    packSizes: 'Per bundle or mixed 3 kg box',
    storage: 'Wrap in a damp cloth and refrigerate. Use within 3 days.',
    outletIds: ['baneshwor', 'jhamsikhel', 'bhaktapur']
  }
];

const FARMS = [
  {
    slug: 'sinja-marsi-cooperative',
    name: 'Sinja Valley Marsi Krishi Sahakari',
    district: 'Jumla',
    province: 'Karnali Province',
    village: 'Sinja Rural Municipality',
    elevation: 2450,
    image: 'images/farms/nepal-terrace-farm.jpg',
    lead: 'Lal Bahadur Rokaya',
    leadRole: 'Chairperson',
    members: 64,
    partnerSince: 'Shrawan 2077',
    summary: 'Sixty four households growing Jumla’s cold tolerant red Marsi rice and wild timur on terraces fed by the Hima river.',
    story: [
      'Marsi is said to be the highest grown rice in the world, and in Sinja it has been planted the same way for centuries. Seeds are saved from the best plants each year, and the fields are watered by streams that come down from the snowline in spring.',
      'For years the cooperative sold to traders who set the price in the village and paid months later. Since 2077 BS the cooperative has agreed a rate with Munaa Krishi before transplanting. Rice is collected at the Sinja collection centre, weighed in front of the farmer and paid into the cooperative account within fifteen days.',
      'Part of every sale goes into a seed bank run by the cooperative women’s committee, so that the old Marsi varieties are not lost to hybrid seed.'
    ],
    practices: ['Snowmelt irrigation', 'Indigenous seed saving', 'Farmyard manure only', 'No chemical fertiliser'],
    featured: true
  },
  {
    slug: 'marpha-thakali-orchard',
    name: 'Marpha Thakali Orchard',
    district: 'Mustang',
    province: 'Gandaki Province',
    village: 'Marpha, Gharpajhong',
    elevation: 2670,
    image: 'images/gallery/farmer-cutting-millet.jpg',
    lead: 'Dawa Sherchan',
    leadRole: 'Orchard owner',
    members: 12,
    partnerSince: 'Bhadra 2078',
    summary: 'A family orchard and eleven neighbouring growers producing crisp Mustang apples and buckwheat in the dry Kali Gandaki valley.',
    story: [
      'The Sherchan family planted their first apple trees in the 1970s with saplings from the government horticulture farm in Marpha. Today the orchard has around 900 trees, and eleven neighbouring families sell through it.',
      'Apples are picked by hand, graded on site and packed in ventilated boxes. Because of the dry climate, the trees need very little spraying. Pests are controlled with pheromone traps and regular pruning.',
      'In winter the same families grow phapar (buckwheat), which is stone ground at the village mill before it comes to our outlets.'
    ],
    practices: ['Drip irrigation', 'Pheromone pest traps', 'Hand picking and grading', 'Stone ground flour']
  },
  {
    slug: 'bheri-mahila-mauri-samuha',
    name: 'Bheri Mahila Mauri Palan Samuha',
    district: 'Surkhet',
    province: 'Karnali Province',
    village: 'Latikoili, Birendranagar 8',
    elevation: 720,
    image: 'images/farms/beekeeper-field.jpg',
    lead: 'Kamala Dahal',
    leadRole: 'Group leader',
    members: 11,
    partnerSince: 'Magh 2078',
    summary: 'Eleven women beekeepers harvesting raw honey from the Chiuri (butter tree) forests of the Bheri river valley.',
    story: [
      'Chiuri trees flower in the cold months between Mangsir and Magh, and the honey they give is pale, thick and slow to crystallise. The women of Latikoili have kept bees in log hives for generations, but they had nowhere to sell beyond the local haat.',
      'Our field team visited in 2078 BS, tested samples in Kathmandu and agreed a fixed price per kilogram. We also helped the group buy stainless steel extractors and food grade storage drums.',
      'The honey is never heated and no sugar is fed to the bees. Each batch is labelled with the harvest month so you know exactly what you are buying.'
    ],
    practices: ['Wild Chiuri forage', 'Traditional log hives', 'Cold extraction', 'No sugar feeding'],
    featured: true
  },
  {
    slug: 'kanyam-small-tea-growers',
    name: 'Kanyam Small Tea Growers Group',
    district: 'Ilam',
    province: 'Koshi Province',
    village: 'Kanyam, Suryodaya Municipality',
    elevation: 1650,
    image: 'images/farms/tea-field.jpg',
    lead: 'Bishnu Maya Rai',
    leadRole: 'Secretary',
    members: 38,
    partnerSince: 'Baisakh 2078',
    summary: 'Thirty eight smallholder families growing orthodox tea on the misty slopes above Kanyam, processed at a shared factory.',
    story: [
      'Most tea farmers in Ilam own less than one ropani of tea bushes each. Selling green leaf to big factories gave them very little. In 2076 BS the Kanyam group set up a small shared factory to make their own orthodox tea.',
      'We buy the first and second flush directly from the group. The leaves are hand plucked, withered overnight and rolled the slow way.'
    ],
    practices: ['Vermicomposting', 'Shade tree intercropping', 'Hand rolled orthodox', 'Neem and titepati sprays']
  },
  {
    slug: 'panauti-krishak-samuha',
    name: 'Panauti Krishak Samuha',
    district: 'Kavrepalanchok',
    province: 'Bagmati Province',
    village: 'Panauti Municipality 7',
    elevation: 1450,
    image: 'images/products/potato-red.jpg',
    lead: 'Hari Prasad Humagain',
    leadRole: 'Coordinator',
    members: 27,
    partnerSince: 'Kartik 2076',
    summary: 'Our very first partner. Twenty seven vegetable farmers supplying red potatoes, rayo saag and seasonal greens to the valley every day.',
    story: [
      'Panauti is two hours from Kathmandu, which makes it perfect for fresh vegetables. Our truck leaves the Panauti collection point at 4:30 every morning and reaches the Baneshwor outlet before opening time.',
      'The group switched fully to vermicompost in 2078 BS with support from the municipality agriculture office. We pay a small premium for certified chemical free crops and share residue test results with every farmer.'
    ],
    practices: ['Vermicomposting', 'Crop rotation', 'Drip irrigation', 'Residue tested monthly'],
    featured: true
  },
  {
    slug: 'langtang-chauri-palak',
    name: 'Langtang Chauri Palak Samuha',
    district: 'Rasuwa',
    province: 'Bagmati Province',
    village: 'Langtang, Gosaikunda Rural Municipality',
    elevation: 3400,
    image: 'images/farms/mountain-pasture.jpg',
    lead: 'Pasang Tamang',
    leadRole: 'Herder and cheesemaker',
    members: 14,
    partnerSince: 'Jestha 2079',
    summary: 'Fourteen herding families making soft chhurpi and yak cheese from chauri milk on the high pastures of Langtang.',
    story: [
      'The families move their chauri and yak herds between summer and winter pastures, the same way their grandparents did. Milk is turned into cheese in small stone huts using wood fired copper pots.',
      'Cheese is carried down to Syabrubesi and brought to Kathmandu once a week. Nothing is added except a little salt.'
    ],
    practices: ['Free range alpine grazing', 'Seasonal herd migration', 'Wood fired curd making', 'No preservatives']
  },
  {
    slug: 'kalinchowk-aama-samuha',
    name: 'Kalinchowk Aama Samuha',
    district: 'Dolakha',
    province: 'Bagmati Province',
    village: 'Kalinchowk Rural Municipality 4',
    elevation: 2100,
    image: 'images/products/gundruk.jpg',
    lead: 'Sita Thami',
    leadRole: 'Chairperson',
    members: 19,
    partnerSince: 'Poush 2079',
    summary: 'A mothers’ group making gundruk and sinki the traditional way, fermented in clay pots and dried on bamboo nanglo.',
    story: [
      'Every winter the Aama Samuha collects mustard, radish and cauliflower leaves from village fields. The leaves are wilted, pressed into clay pots and left to ferment for two to three weeks before sun drying.',
      'Earnings from gundruk now pay for the group’s savings fund, which gives small loans to members for goats and seeds.'
    ],
    practices: ['Natural fermentation', 'Sun drying on nanglo', 'Local mustard and radish greens', 'Hand packed']
  }
];

const OUTLETS = [
  {
    id: 'baneshwor',
    name: 'Munaa Krishi Baneshwor',
    area: 'New Baneshwor',
    address: 'Shantinagar Gate, New Baneshwor, Kathmandu 31',
    city: 'Kathmandu',
    phones: ['01-4791236', '9801236540'],
    email: 'baneshwor@munaakrishi.com.np',
    hours: '7:00 AM to 8:30 PM',
    days: 'Open all 7 days'
  },
  {
    id: 'jhamsikhel',
    name: 'Munaa Krishi Jhamsikhel',
    area: 'Jhamsikhel',
    address: 'Jhamsikhel Road, near Sanepa Chowk, Lalitpur 3',
    city: 'Lalitpur',
    phones: ['01-5437718', '9801236541'],
    email: 'jhamsikhel@munaakrishi.com.np',
    hours: '7:30 AM to 8:00 PM',
    days: 'Open all 7 days'
  },
  {
    id: 'bhaktapur',
    name: 'Munaa Krishi Suryabinayak',
    area: 'Suryabinayak',
    address: 'Araniko Highway, Suryabinayak 4, Bhaktapur',
    city: 'Bhaktapur',
    phones: ['01-6614520', '9801236542'],
    email: 'bhaktapur@munaakrishi.com.np',
    hours: '7:00 AM to 8:00 PM',
    days: 'Closed on Saturday afternoon'
  },
  {
    id: 'pokhara',
    name: 'Munaa Krishi Lakeside',
    area: 'Lakeside',
    address: 'Baidam Road, Lakeside 6, Pokhara, Kaski',
    city: 'Pokhara',
    phones: ['061-465238', '9801236543'],
    email: 'pokhara@munaakrishi.com.np',
    hours: '8:00 AM to 9:00 PM',
    days: 'Open all 7 days'
  },
  {
    id: 'bharatpur',
    name: 'Munaa Krishi Narayangadh',
    area: 'Pulchowk',
    address: 'Pulchowk, Bharatpur 10, Chitwan',
    city: 'Bharatpur',
    phones: ['056-591847', '9801236544'],
    email: 'chitwan@munaakrishi.com.np',
    hours: '7:00 AM to 8:00 PM',
    days: 'Open all 7 days'
  }
];

const SYNOPSIS_DATA = {
  whoWeAre: [
    "Munaa Krishi Limited is a social enterprise and agribusiness initiative jointly envisioned by the Non-Resident Nepali Association (NRNA) and the Government of Nepal to transform Nepal's subsistence agriculture into a modern, commercially viable, and sustainable agricultural system. The company is registered under the Companies Act of Nepal, Regd. No. 232466/076/077, introducing technologies tested around the world.",
    "The company aims to establish an integrated agricultural value chain by collecting, processing, branding, and marketing agricultural products under the munaa brand. It seeks to bridge the gap between producers and consumers, ensure fair prices and reliable markets for farmers, provide consumers with safe and high-quality food at affordable prices, reduce post-harvest losses, strengthen Nepal’s agricultural economy, and promote high-value agricultural products in national and international markets."
  ],
  vision: "To be Nepal's leading integrated and trusted agribusiness company, contribute to Nepal's agricultural transformation and the Sustainable Development Goals (SDGs), and ensure every consumer has access to safe, fresh, healthy, and affordable agricultural products.",
  mission: "To empower farmers and transform Nepal's agriculture by delivering innovative, sustainable, and market-driven agribusiness solutions through strategic partnerships and global collaboration.",
  objectives: [
    'Promote sustainable agricultural development in collaboration with NRNs, government agencies, local governments, farmers, cooperatives, and other stakeholders.',
    'Promote organic, scientific, and climate-smart agriculture through research, innovation, training, and extension services.',
    'Engage in the production, processing, storage, distribution, import, export, and marketing of agricultural and livestock products.',
    'Strengthen farmers through capacity building, market access, value chain development, and good agricultural practices.',
    'Contribute to employment generation, food security, sustainable economic development, and the growth of Nepal’s agricultural sector.',
    'Develop a trusted national agricultural brand.'
  ],
  whatWeDo: [
    'Buy-back guarantee for farmers',
    'Agricultural value chain development',
    'Collection, grading, packaging, and distribution',
    'Promotion of safe and organic farming',
    'Technology transfer and farmer training',
    'Retail marketing through the Munaa Bazar supermarket chain',
    'Market linkage and business development'
  ],
  workingStrategies: [
    'Collect agricultural products directly from farmers and cooperatives.',
    'Transport products safely to centralized processing facilities.',
    'Conduct quality inspection and certification.',
    'Clean, grade, package, label, and brand agricultural products.',
    'Store products in cold chain facilities where necessary.',
    'Through Munaa marts, retailers, and home delivery.',
    'Promote selected high-value agricultural commodities in international markets.'
  ],
  whyMunaa: [
    'Trusted NRN initiative',
    'Fair partnership with farmers',
    'Technology-driven agriculture',
    'Safe, fresh, and quality products',
    'Transparent and sustainable business practices',
    "Dedicated to strengthening Nepal's agriculture"
  ],
  businessModel: 'Munaa will operate as a socially responsible, profit-oriented agribusiness enterprise, balancing commercial sustainability with positive social impact.',
  commitment: 'Munaa is committed to building a transparent, technology-driven, and inclusive agricultural ecosystem that benefits both producers and consumers while supporting Nepal’s long-term agricultural transformation.',
  shopping: [
    'Munaabazar Mart / Outlets across major cities',
    'Online shopping with local delivery',
    'Call on delivery for home and office',
    'International export of certified Himalayan produce'
  ],
  outletsSynopsis: [
    { address: 'Sanepa, Lalitpur', phones: [{ label: '98031 65605', value: '9803165605' }] },
    { address: 'Imadol, Lalitpur', phones: [{ label: '98018 15440', value: '9801815440' }] },
    { address: 'Hattiban, Lalitpur', phones: [{ label: '98018 15440', value: '9801815440' }] },
    { address: 'Golphutar, Kathmandu', phones: [{ label: '98018 00299', value: '9801800299' }] },
    { address: 'Mid-Baneshwor', phones: [{ label: '9700022558', value: '9700022558' }] },
    { address: 'Pokhara, Srijana Chowk', phones: [{ label: '98028 52177', value: '9802852177', note: 'Delivery' }, { label: '98028 52178', value: '9802852178', note: 'Office' }] }
  ]
};

const NEWS_POSTS = [
  {
    slug: 'marpha-apple-harvest-2083',
    title: 'Marpha apples arrive at all five outlets',
    category: 'Harvest Stories',
    date: 'September 28, 2026',
    dateNp: 'असोज १२, २०८३',
    readMinutes: 3,
    excerpt: 'The first 1,200 kg of this year’s Marpha harvest reached Kathmandu last week. Here is what to expect from the season.',
    image: 'images/gallery/farmer-cutting-millet.jpg',
    author: 'Prakash Rokaya',
    body: [
      'The first truck of Marpha apples left Mustang on Asoj 8 and reached our Balkhu warehouse two days later. After grading, around 1,200 kg went out to all five outlets.',
      'Dawa Sherchan, who leads our partner orchard, says this year’s crop is smaller than last year because of hail in Jestha, but the fruit is sweeter. Expect the best eating apples between now and the end of Kartik.',
      'Schools, hotels and offices that want to book 10 kg boxes for Dashain and Tihar can send us a bulk inquiry. We will confirm quantities by phone within one working day.'
    ]
  },
  {
    slug: 'kamala-dahal-chiuri-honey',
    title: 'Meet Kamala Dahal, the beekeeper behind our Chiuri honey',
    category: 'Farmer Spotlight',
    date: 'September 15, 2026',
    dateNp: 'भदौ ३०, २०८३',
    readMinutes: 4,
    excerpt: 'Kamala and ten other women in Latikoili turned a village tradition into a steady income. We spent a day with them in Surkhet.',
    image: 'images/farms/beekeeper-field.jpg',
    author: 'Sabina Shrestha',
    body: [
      'Kamala Dahal has kept bees since she was twelve. Her mother used hollow logs hung under the eaves of the house, and Kamala still uses a few of those today alongside modern box hives.',
      'In 2078 BS she brought ten neighbours together to form the Bheri Mahila Mauri Palan Samuha. Together they now produce around 900 kg of Chiuri honey a year.',
      '"The best thing is that we know the price before we harvest," she told us. "Earlier we had to accept whatever the trader offered."'
    ]
  },
  {
    slug: 'teej-haat-baneshwor',
    title: 'Teej haat at our Baneshwor outlet',
    category: 'Community',
    date: 'September 12, 2026',
    dateNp: 'भदौ २७, २०८३',
    readMinutes: 2,
    excerpt: 'Twelve women’s groups set up stalls for a two day Teej haat. Thank you to everyone who came.',
    image: 'images/products/greens-seasonal.jpg',
    author: 'Sarita Poudel',
    body: [
      'For two days before Teej, the car park at our Baneshwor outlet turned into a small haat. Twelve women’s groups from Kavre, Dolakha and Sindhupalchok sold achar, gundruk, bangles and handwoven dhaka.',
      'All stall space was free, and the groups kept every rupee they earned.'
    ]
  },
  {
    slug: 'reviving-jumla-marsi-rice',
    title: 'How Sinja farmers are keeping Jumla’s Marsi rice alive',
    category: 'Harvest Stories',
    date: 'August 30, 2026',
    dateNp: 'भदौ १४, २०८३',
    readMinutes: 5,
    excerpt: 'Hybrid seed is spreading fast in Karnali. A community seed bank in Sinja is working to protect the old red rice.',
    image: 'images/farms/nepal-terrace-farm.jpg',
    author: 'Prakash Rokaya',
    body: [
      'Marsi has been grown in Jumla for hundreds of years, but younger farmers are increasingly switching to higher yield hybrid varieties.',
      'The Sinja cooperative’s women’s committee now runs a seed bank that stores and shares the best Marsi seed each year. Munaa Krishi contributes two rupees from every kilogram sold.'
    ]
  },
  {
    slug: 'storing-gundruk-monsoon',
    title: 'Five simple ways to keep gundruk fresh through the monsoon',
    category: 'Farming Tips',
    date: 'July 21, 2026',
    dateNp: 'साउन ५, २०८३',
    readMinutes: 2,
    excerpt: 'Damp weather is the enemy of gundruk. Tips from the Kalinchowk Aama Samuha on storing it right.',
    image: 'images/products/gundruk.jpg',
    author: 'Anusha Karki',
    body: [
      'Gundruk can last a whole year, but only if it stays dry. Keep it in a glass jar with a tight lid rather than a plastic bag.',
      'On a sunny day, spread it on a nanglo for an hour to dry it out again. Never store it near the stove where steam can reach it.'
    ]
  }
];

const GALLERY_PHOTOS = [
  { id: 'g1', album: 'harvest', image: 'images/farms/nepal-terrace-farm.jpg', caption: 'Carrying the first paddy of the season', place: 'Sinja, Jumla' },
  { id: 'g2', album: 'harvest', image: 'images/gallery/farmer-cutting-millet.jpg', caption: 'Apple picking at the Sherchan orchard', place: 'Marpha, Mustang' },
  { id: 'g3', album: 'farm-visits', image: 'images/farms/beekeeper-field.jpg', caption: 'Kamala didi showing a full Chiuri frame', place: 'Latikoili, Surkhet' },
  { id: 'g4', album: 'outlets', image: 'images/gallery/farmer-cutting-millet.jpg', caption: 'Morning at the Baneshwor outlet', place: 'New Baneshwor, Kathmandu' },
  { id: 'g5', album: 'farm-visits', image: 'images/farms/mountain-pasture.jpg', caption: 'Chauri herds on the summer kharka', place: 'Langtang, Rasuwa' },
  { id: 'g6', album: 'harvest', image: 'images/farms/tea-field.jpg', caption: 'First flush plucking', place: 'Kanyam, Ilam' },
  { id: 'g7', album: 'community', image: 'images/products/greens-seasonal.jpg', caption: 'Fresh greens at the Teej haat', place: 'Baneshwor, Kathmandu' },
  { id: 'g8', album: 'harvest', image: 'images/products/potato-red.jpg', caption: 'Red potatoes straight from the field', place: 'Panauti, Kavre' },
  { id: 'g9', album: 'community', image: 'images/products/gundruk.jpg', caption: 'Drying gundruk with the Aama Samuha', place: 'Kalinchowk, Dolakha' },
  { id: 'g10', album: 'outlets', image: 'images/products/honey-chiuri.jpg', caption: 'Chiuri honey on the Jhamsikhel shelf', place: 'Jhamsikhel, Lalitpur' },
  { id: 'g11', album: 'farm-visits', image: 'images/team/team-field.jpg', caption: 'Prakash on a field visit', place: 'Sinja, Jumla' },
  { id: 'g12', album: 'harvest', image: 'images/products/rice-marsi.jpg', caption: 'Newly milled Marsi rice', place: 'Sinja collection centre' }
];

const DIRECTORS = [
  {
    id: 'aarav-shrestha',
    name: 'Aarav Shrestha',
    position: 'Chairperson',
    image: 'images/team/team-director.jpg',
    description: 'Aarav chairs the board and keeps discussions focused on the company\'s responsibilities to farmers, consumers and shareholders.'
  },
  {
    id: 'maya-karki',
    name: 'Maya Karki',
    position: 'Director',
    image: 'images/team/team-quality.jpg',
    description: 'Maya brings experience in food quality and agricultural markets, advising the board on standards and consumer trust.'
  },
  {
    id: 'rajan-gurung',
    name: 'Rajan Gurung',
    position: 'Director',
    image: 'images/team/team-operations.jpg',
    description: 'Rajan works closely with the board on logistics, processing facilities, and distribution across Nepal.'
  },
  {
    id: 'sita-adhikari',
    name: 'Sita Adhikari',
    position: 'Director',
    image: 'images/team/team-field.jpg',
    description: 'Sita brings a strong field perspective to board deliberations, emphasizing rural livelihoods and farmer empowerment.'
  }
];

const TEAM_MEMBERS = [
  {
    id: 'sabina-shrestha',
    name: 'Sabina Shrestha',
    role: 'Founder and Managing Director',
    department: 'Management',
    location: 'Lalitpur',
    bio: 'Sabina started Munaa Krishi in 2076 BS and named it after her mother. Before that she spent twelve years working with agricultural cooperatives in Karnali.',
    photo: 'images/team/team-director.jpg'
  },
  {
    id: 'bikash-thapa-magar',
    name: 'Bikash Thapa Magar',
    role: 'Head of Operations',
    department: 'Operations',
    location: 'Kathmandu',
    bio: 'Bikash runs collection, transport and the Balkhu warehouse. He makes sure produce from Panauti reaches the shelves before 7 AM every day.',
    photo: 'images/team/team-operations.jpg'
  },
  {
    id: 'prakash-rokaya',
    name: 'Prakash Rokaya',
    role: 'Field Coordinator, Karnali',
    department: 'Field Team',
    location: 'Jumla',
    bio: 'Born in Sinja, Prakash studied agriculture at Jumla campus and now works with partner farms across Jumla, Mugu and Surkhet.',
    photo: 'images/team/team-field.jpg'
  },
  {
    id: 'anusha-karki',
    name: 'Anusha Karki',
    role: 'Quality and Food Safety Lead',
    department: 'Quality',
    location: 'Kathmandu',
    bio: 'Anusha holds a B.Tech in Food Technology from Tribhuvan University. Her team inspects every incoming lot and sends samples for residue tests.',
    photo: 'images/team/team-quality.jpg'
  },
  {
    id: 'dil-bahadur-tamang',
    name: 'Dil Bahadur Tamang',
    role: 'Field Officer, Rasuwa and Nuwakot',
    department: 'Field Team',
    location: 'Dhunche',
    bio: 'Dil Bahadur works with herders and vegetable groups in the northern hills and organises the weekly cheese pickup from Syabrubesi.'
  },
  {
    id: 'sarita-poudel',
    name: 'Sarita Poudel',
    role: 'Outlet Manager, Baneshwor',
    department: 'Outlets',
    location: 'Kathmandu',
    bio: 'Sarita leads our busiest outlet and its team of nine. Regular customers know her for remembering exactly which rice they bought last time.'
  },
  {
    id: 'pema-gurung',
    name: 'Pema Gurung',
    role: 'Outlet Manager, Lakeside',
    department: 'Outlets',
    location: 'Pokhara',
    bio: 'Pema opened the Pokhara outlet in 2080 BS and handles supply to hotels and trekking lodges in Kaski.'
  },
  {
    id: 'nabin-adhikari',
    name: 'Nabin Adhikari',
    role: 'Accounts and Farmer Payments',
    department: 'Operations',
    location: 'Lalitpur',
    bio: 'Nabin makes sure every cooperative is paid within fifteen days and publishes the monthly farm gate price sheet.'
  }
];

// Helper functions for catalog queries
function getProductBySlug(slug) {
  return PRODUCTS.find(p => p.slug === slug);
}

function getFarmBySlug(slug) {
  return FARMS.find(f => f.slug === slug);
}

function getCategoryById(id) {
  return CATEGORIES.find(c => c.id === id);
}

function getOutletById(id) {
  return OUTLETS.find(o => o.id === id);
}

function getProductsByFarm(farmSlug) {
  return PRODUCTS.filter(p => p.farmSlug === farmSlug);
}
