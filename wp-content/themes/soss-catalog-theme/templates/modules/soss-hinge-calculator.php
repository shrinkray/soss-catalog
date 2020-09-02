



<script>



  let measurement_system = "english";
  let length_unit;
  let weight_unit;
  let solution_matches;
  let table;
  let debug = false;      // Toggle to turn on/off display of y intercepts
  let test = false;       // Toggle to turn on/off test mode

  let door_weight_factor = [
    [10, .7],
    [11, 1.8],
    [12, 3],
    [13, 3.9],
    [14, 4.1],
    [15, 5],
    [16, 5.5],
    [17, 6],
    [18, 6.5],
    [19, 7.1],
    [20, 8.8],
    [25, 11.2],
    [30, 13.9],
    [35, 16],
    [40, 17.7],
    [50, 20.7],
    [60, 22.8],
    [70, 25],
    [80, 26.4],
    [90, 28.2],
    [100, 29.8],
    [150, 34.6],
    [200, 38.5],
    [300, 43.5],
    [400, 47],
    [500, 49.9]
  ];

  let door_width_factor = [
    [ 4, 55.5],
    [ 5, 53.1],
    [ 6, 49.9],
    [ 7, 46.8],
    [ 8, 44.3],
    [ 9, 41.4],
    [10, 39],
    [11, 37.4],
    [12, 35.4],
    [13, 34.1],
    [14, 32.6],
    [15, 31],
    [16, 29.8],
    [17, 28.3],
    [18, 27.3],
    [19, 26.7],
    [20, 26],
    [22, 24],
    [24, 22.1],
    [26, 20.2],
    [28, 18.7],
    [30, 17.2],
    [32, 16],
    [34, 14.8],
    [36, 13.5],
    [38, 12.5],
    [40, 11.5],
    [42, 10.2],
    [44, 9.3],
    [46, 8.2],
    [48, 7.2],
    [50, 6.3],
    [55, 5],
    [60, 3.2],
    [65, 1.9],
    [70, 0],
  ];


  let solutions = [
    {model: "220" , material:  "both", min_thickness: "32/16", top_range: 100.4, bot_range:  74.5, hinges: 4 },
    {model: "220" , material:  "both", min_thickness: "32/16", top_range:  74.5, bot_range:  58.1, hinges: 3 },
    {model: "220" , material:  "both", min_thickness: "32/16", top_range:  58.1, bot_range:  -112, hinges: 2 },
    {model: "218" , material:  "both", min_thickness: "28/16", top_range: 100.4, bot_range:  89.4, hinges: 6 },
    {model: "218" , material:  "both", min_thickness: "28/16", top_range:  89.4, bot_range:  78.5, hinges: 5 },
    {model: "218" , material:  "both", min_thickness: "28/16", top_range:  78.5, bot_range:  65.2, hinges: 4 },
    {model: "218" , material:  "both", min_thickness: "28/16", top_range:  65.2, bot_range:  42.9, hinges: 3 },
    {model: "218" , material:  "both", min_thickness: "28/16", top_range:  42.9, bot_range:  -112, hinges: 2 },
    {model: "216" , material:  "both", min_thickness: "22/16", top_range:  69.3, bot_range:  56.5, hinges: 4 },
    {model: "216" , material:  "both", min_thickness: "22/16", top_range:  56.5, bot_range:  35.0, hinges: 3 },
    {model: "216" , material:  "both", min_thickness: "22/16", top_range:  35.0, bot_range:  -112, hinges: 2 },
    {model: "212" , material:  "both", min_thickness: "18/16", top_range:  52.2, bot_range:  39.7, hinges: 4 },
    {model: "212" , material:  "both", min_thickness: "18/16", top_range:  39.7, bot_range:  17.1, hinges: 3 },
    {model: "212" , material:  "both", min_thickness: "18/16", top_range:  17.1, bot_range:  -112, hinges: 2 },
    {model: "208" , material:  "both", min_thickness: "16/16", top_range:  41.1, bot_range:  22.8, hinges: 4 },
    {model: "208" , material:  "both", min_thickness: "16/16", top_range:  22.8, bot_range:   8.8, hinges: 3 },
    {model: "208" , material:  "both", min_thickness: "16/16", top_range:   8.8, bot_range:  -112, hinges: 2 },
    {model: "204" , material:  "both", min_thickness: "12/16", top_range:  37.0, bot_range:  17.8, hinges: 4 },
    {model: "204" , material:  "both", min_thickness: "12/16", top_range:  17.8, bot_range:   2.5, hinges: 3 },
    {model: "204" , material:  "both", min_thickness: "12/16", top_range:   2.5, bot_range:  -112, hinges: 2 },
    {model: "203" , material:  "both", min_thickness: "12/16", top_range:  23.9, bot_range:   5.0, hinges: 4 },
    {model: "203" , material:  "both", min_thickness: "12/16", top_range:   5.0, bot_range:  -9.3, hinges: 3 },
    {model: "203" , material:  "both", min_thickness: "12/16", top_range:  -9.3, bot_range:  -112, hinges: 2 },
    {model: "103" , material:  "both", min_thickness: "12/16", top_range:  22.0, bot_range:   1.8, hinges: 4 },
    {model: "103" , material:  "both", min_thickness: "12/16", top_range:   1.8, bot_range: -13.9, hinges: 3 },
    {model: "103" , material:  "both", min_thickness: "12/16", top_range: -13.9, bot_range:  -112, hinges: 2 },
    {model: "303" , material:  "both", min_thickness: "11/16", top_range:  22.0, bot_range:   1.8, hinges: 4 },
    {model: "303" , material:  "both", min_thickness: "11/16", top_range:   1.8, bot_range: -13.9, hinges: 3 },
    {model: "303" , material:  "both", min_thickness: "11/16", top_range: -13.9, bot_range:  -112, hinges: 2 },
    {model: "106" , material: "metal", min_thickness: "10/16", top_range:  36.3, bot_range:  21.1, hinges: 4 },
    {model: "106" , material: "metal", min_thickness: "10/16", top_range:  21.1, bot_range:  -3.5, hinges: 3 },
    {model: "106" , material: "metal", min_thickness: "10/16", top_range:  -3.5, bot_range:  -112, hinges: 2 },
    {model: "205" , material: "metal", min_thickness:  "9/16", top_range:  36.3, bot_range:  21.1, hinges: 4 },
    {model: "205" , material: "metal", min_thickness:  "9/16", top_range:  21.1, bot_range:  -3.5, hinges: 3 },
    {model: "205" , material: "metal", min_thickness:  "9/16", top_range:  -3.5, bot_range:  -112, hinges: 2 },
    {model: "314" , material: "metal", min_thickness:  "9/16", top_range:  22.8, bot_range:  11.5, hinges: 4 },
    {model: "314" , material: "metal", min_thickness:  "9/16", top_range:  11.5, bot_range:  -9.3, hinges: 3 },
    {model: "314" , material: "metal", min_thickness:  "9/16", top_range:  -9.3, bot_range:  -112, hinges: 2 },
    {model: "114" , material: "metal", min_thickness:  "9/16", top_range:  22.8, bot_range:  11.5, hinges: 4 },
    {model: "114" , material: "metal", min_thickness:  "9/16", top_range:  11.5, bot_range:  -9.3, hinges: 3 },
    {model: "114" , material: "metal", min_thickness:  "9/16", top_range:  -9.3, bot_range:  -112, hinges: 2 },
    {model: "101" , material:  "both", min_thickness:  "8/16", top_range:  30.0, bot_range:   7.1, hinges: 4 },
    {model: "101" , material:  "both", min_thickness:  "8/16", top_range:   7.1, bot_range:  -8.1, hinges: 3 },
    {model: "101" , material:  "both", min_thickness:  "8/16", top_range:  -8.1, bot_range:  -112, hinges: 2 },
    {model: "100" , material:  "both", min_thickness:  "8/16", top_range:  11.5, bot_range: -16.0, hinges: 4 },
    {model: "100" , material:  "both", min_thickness:  "8/16", top_range: -16.0, bot_range:  -112, hinges: 3 },
  ];

  let min_thickness = [
    { eng_display: '--',    eng_value: '0',      metric_display: '--',    models: [] },
    { eng_display: '1/2',   eng_value: '8/16',   metric_display: '12.70', models: ['100', '101'] },
    { eng_display: '9/16',  eng_value: '9/16',   metric_display: '14.29', models: ['114', '314', '205'] },
    { eng_display: '5/8',   eng_value: '10/16',  metric_display: '15.88', models: ['106'] },
    { eng_display: '11/16', eng_value: '11/16',  metric_display: '17.46', models: ['303', '101'] },
    { eng_display: '3/4',   eng_value: '12/16',  metric_display: '19.05', models: ['103', '203', '204'] },
    { eng_display: '1',     eng_value: '16/16',  metric_display: '25.40', models: ['208', '204'] },
    { eng_display: '1 1/8', eng_value: '18/16',  metric_display: '28.56', models: ['212', '208'] },
    { eng_display: '1 3/8', eng_value: '22/16',  metric_display: '34.93', models: ['216', '212'] },
    { eng_display: '1 3/4', eng_value: '28/16',  metric_display: '44.45', models: ['218', '216'] },
    { eng_display: '2',     eng_value: '32/16',  metric_display: '50.80', models: ['220', '218'] },
  ];


  let test_cases = [
    { height: "50", width: "50", thickness: "32/16", weight: "500", material: "wood", units: "english", matches: []},
    // A''
    { height: "50", width: "55", thickness: "32/16", weight: "200", material: "wood", units: "english", matches: [{model: "218", hinge_count: 6}, {model: "220", hinge_count: 4}]},
    // A'
    { height: "50", width: "16", thickness: "32/16", weight: "500", material: "wood", units: "english", matches: [{model: "218", hinge_count: 5}, {model: "220", hinge_count: 4}]},
    { height: "50", width: "18", thickness: "32/16", weight: "400", material: "wood", units: "english", matches: [{model: "218", hinge_count: 5}, {model: "220", hinge_count: 4}]},
    // A
    { height: "50", width: "17", thickness: "32/16", weight: "400", material: "wood", units: "english", matches: [{model: "218", hinge_count: 4}, {model: "220", hinge_count: 4}]},
    { height: "50", width: "34", thickness: "32/16", weight: "200", material: "wood", units: "english", matches: [{model: "218", hinge_count: 4}, {model: "220", hinge_count: 4}]},
    { height: "50", width: "34", thickness: "28/16", weight: "200", material: "wood", units: "english", matches: [{model: "218", hinge_count: 4}]},
    // B
    { height: "1600", width: "250", thickness: "32/16", weight: "226", material: "wood", units: "metric", matches: [{model: "218", hinge_count: 4}, {model: "220", hinge_count: 3}]},
    { height: "1600", width: "250", thickness: "22/16", weight: "226", material: "wood", units: "metric", matches: [{model: "216", hinge_count: 4}]},
    // C
    { height: "50", width: "70", thickness: "32/16", weight: "60", material: "wood", units: "english", matches: [{model: "218", hinge_count: 3}, {model: "220", hinge_count: 3}]},
    { height: "50", width: "70", thickness: "28/16", weight: "60", material: "wood", units: "english", matches: [{model: "216", hinge_count: 4}, {model: "218", hinge_count: 3}]},
    { height: "60", width: "36", thickness: "28/16", weight: "125", material: "wood", units: "english", matches: [{model: "216", hinge_count: 4}, {model: "218", hinge_count: 3}]},
    // D
    // E
    { height: "50", width: "12", thickness: "32/16", weight: "300", material: "wood", units: "english", matches: [{model: "218", hinge_count: 3}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "12", thickness: "28/16", weight: "300", material: "wood", units: "english", matches: [{model: "216", hinge_count: 4}, {model: "218", hinge_count: 3}]},
    // F
    { height: "50", width: "34", thickness: "32/16", weight: "100", material: "wood", units: "english", matches: [{model: "218", hinge_count: 3}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "34", thickness: "28/16", weight: "100", material: "wood", units: "english", matches: [{model: "216", hinge_count: 3}, {model: "218", hinge_count: 3}]},
    { height: "50", width: "34", thickness: "22/16", weight: "100", material: "wood", units: "english", matches: [{model: "216", hinge_count: 3}]},
    { height: "50", width: "10", thickness: "32/16", weight: "300", material: "wood", units: "english", matches: [{model: "218", hinge_count: 3}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "10", thickness: "28/16", weight: "300", material: "wood", units: "english", matches: [{model: "216", hinge_count: 3}, {model: "218", hinge_count: 3}]},
    { height: "50", width: "10", thickness: "18/16", weight: "300", material: "wood", units: "english", matches: [{model: "212", hinge_count: 4}]},
    { height: "50", width: "50", thickness: "32/16", weight: "50", material: "wood", units: "english", matches: [{model: "218", hinge_count: 3}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "50", thickness: "22/16", weight: "50", material: "wood", units: "english", matches: [{model: "212", hinge_count: 4}, {model: "216", hinge_count: 3}]},
    { height: "50", width: "12", thickness: "32/16", weight: "200", material: "wood", units: "english", matches: [{model: "218", hinge_count: 3}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "12", thickness: "22/16", weight: "200", material: "wood", units: "english", matches: [{model: "212", hinge_count: 4}, {model: "216", hinge_count: 3}]},
    // G
    { height: "50", width: "6", thickness: "32/16", weight: "400", material: "wood", units: "english", matches: [{model: "218", hinge_count: 2}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "6", thickness: "22/16", weight: "400", material: "wood", units: "english", matches: [{model: "212", hinge_count: 4}, {model: "216", hinge_count: 3}]},
    { height: "1270", width: "152.4", thickness: "32/16", weight: "181.82", material: "wood", units: "metric", matches: [{model: "218", hinge_count: 2}, {model: "220", hinge_count: 2}]},
    { height: "1270", width: "152.4", thickness: "22/16", weight: "181.82", material: "wood", units: "metric", matches: [{model: "212", hinge_count: 4}, {model: "216", hinge_count: 3}]},
    // H
    // I
    // J
    // K
    // L
    // M
    // N
    // O
    // P
    // Q
    { height: "50", width: "16.5", thickness: "32/16", weight: "70", material: "metal", units: "english", matches: [{model: "218", hinge_count: 2}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "16.5", thickness: "22/16", weight: "70", material: "metal", units: "english", matches: [{model: "212", hinge_count: 3}, {model: "216", hinge_count: 2}]},
    { height: "50", width: "16.5", thickness: "16/16", weight: "70", material: "metal", units: "english", matches: [{model: "204", hinge_count: 3}, {model: "208", hinge_count: 3}]},
    { height: "50", width: "16.5", thickness: "11/16", weight: "70", material: "metal", units: "english", matches: [{model: "101", hinge_count: 4}, {model: "303", hinge_count: 4}]},
    { height: "50", width: "16.5", thickness: "9/16", weight: "70", material: "metal", units: "english", matches: [{model: "114", hinge_count: 4}, {model: "314", hinge_count: 4}, {model: "205", hinge_count: 3}]},
    // R
    // S
    // T
    // U
    // V
    // W
    // X
    // Y
    // Z
    // Z2
    // Z3
    // Z4
    // Z5
    { height: "50", width: "40", thickness: "32/16", weight: "10", material: "wood", units: "english", matches: [{model: "218", hinge_count: 2}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "22/16", weight: "10", material: "wood", units: "english", matches: [{model: "212", hinge_count: 2}, {model: "216", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "16/16", weight: "10", material: "wood", units: "english", matches: [{model: "204", hinge_count: 2}, {model: "208", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "11/16", weight: "10", material: "wood", units: "english", matches: [{model: "101", hinge_count: 2}, {model: "303", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "9/16", weight: "10", material: "wood", units: "english", matches: []},
    { height: "50", width: "40", thickness: "32/16", weight: "10", material: "metal", units: "english", matches: [{model: "218", hinge_count: 2}, {model: "220", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "22/16", weight: "10", material: "metal", units: "english", matches: [{model: "212", hinge_count: 2}, {model: "216", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "16/16", weight: "10", material: "metal", units: "english", matches: [{model: "204", hinge_count: 2}, {model: "208", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "11/16", weight: "10", material: "metal", units: "english", matches: [{model: "101", hinge_count: 2}, {model: "303", hinge_count: 2}]},
    { height: "50", width: "40", thickness: "9/16", weight: "10", material: "metal", units: "english", matches: [{model: "114", hinge_count: 2}, {model: "314", hinge_count: 2}, {model: "205", hinge_count: 2}]},
    // TEST - will show detection of 'found' and 'not found' errors work properly
    // { height: "50", width: "17", thickness: "32/16", weight: "400", material: "wood", units: "english", matches: [{model: "218", hinge_count: 4}, {model: "666", hinge_count: 5}, {model: "220", hinge_count: 3}]},
    // { height: "50", width: "34", thickness: "32/16", weight: "200", material: "wood", units: "english", matches: [{model: "218", hinge_count: 4}]},
  ];
  let test_num = 0;

  // Input data validators

  function validate_height() {
    if (units_value() === "english") {
      lower = 4;
      upper = 240;
    }
    else {
      lower = 100;
      upper = 6000;
    }
    return validate_dimension(document.door_data.height, "Height", lower, upper, length_unit, 'height-error');
  }

  function validate_width() {
    if (units_value() === "english") {
      lower = 4;
      upper = 70;
    }
    else {
      lower = 100;
      upper = 1750;
    }
    return validate_dimension(document.door_data.width, "Width", lower, upper, length_unit, 'width-error');
  }

  function validate_thickness() {
    element = document.door_data.thickness;
    if(element.value === min_thickness[0].eng_value ) {
      document.getElementById('thickness-error').innerHTML = 'A minimum door thickness must be selected.';
      invalid_input_field(element);
      return false;
    }
    document.getElementById('thickness-error').innerHTML = '';
    valid_input_field(element);
    return true;
  }

  function validate_weight() {
    if (units_value() === "english") {
      lower = 10;
      upper = 500;
    }
    else {
      lower = 5;
      upper = 225;
    }
    return validate_dimension(document.door_data.weight, "Weight", lower, upper, weight_unit, 'weight-error');
  }

  function validate_dimension(element, display, lower, upper, units, error_id) {
    let dimension = element.value;
    msg = "";

    if(is_empty(dimension)) {
      msg =  display + " must be added."
    }
    else if(isNaN(dimension)) {
      msg = display + " must be a number."
    }
    else {
      let num = parseFloat(dimension);
      if((num < lower) || (num > upper)) {
        msg = display + " must be between " + lower.toString() + " and " + upper.toString() + " " + units + ".";
      }
    }
    document.getElementById(error_id).innerHTML = msg;
    if(msg !== "") {
      invalid_input_field(element);
      return false;
    }
    valid_input_field(element);
    return true;
  }

  function calculate(table) {
    // Run all validations first
    // valid = validate_height();
    // valid &= validate_width();
    // valid &= validate_thickness();
    // valid &= validate_weight();
    // if(!valid) {
    //   return;
    // }

    // Lookup width coordinate
    let y1 = calculate_width_coordinate();

    // Lookup weight coordinate
    let y2 = calculate_weight_coordinate();

    // Calculate A line intersect
    let y3 = calculate_a_line_intersect(y1, y2);

    // Search solutions for matches
    for(let i = 0; i < solutions.length; i++) {
      check_possible_solution( solutions[i], y3 );
    }

    if(debug) {
      let row;
      let cell;
      row = table.insertRow();
      cell = row.insertCell();
      cell.innerHTML = "Width Y: " + y1.toFixed(2)
      cell = row.insertCell();
      cell.innerHTML = "Weight Y: " + y2.toFixed(2)
      cell = row.insertCell();
      cell.innerHTML = "A Line Y: " + y3.toFixed(2)
    }
  }


  function calculate_width_coordinate() {
    return table_interpolate(get_width(), door_width_factor);
  }

  function calculate_weight_coordinate() {
    return table_interpolate(get_weight(), door_weight_factor);
  }

  function table_interpolate(value, table) {
    let i;

    // Find index of high values; index of low values always one less.
    for(i = 1; (i < table.length) && (value > table[i][0]); i++);

    if( i >= table.length ) {
      return 0;
    }

    // Linear interpolate to get value (e.g. weight) coordinate wc
    //
    //  wc = value coordinate
    //  w = value
    //  i = index to high range values [w1, wc1]
    //  i-1 = index to low range values [w0, wc0]
    //
    //  (wc - wc0)/(wc1 - wc0) = (w - w0)/(w1 - w0)

    let w0  = table[i-1][0];
    let wc0 = table[i-1][1];
    let w1  = table[i][0];
    let wc1 = table[i][1];
    let wc = (((value - w0) * (wc1 - wc0)) / (w1 - w0)) + wc0;

    return wc;
  }

  function calculate_a_line_intersect(y1, y2) {
    //  x1 = 0
    //  x2 = 33.9 / 16
    //  x3 = 91.1 / 16
    //
    // y = mx + b
    // y3 = ((y2-y1/x2-x1))x2 + y1

    return (((y2 - y1)/(33.9)) * (91.1)) + y1;
  }

  function check_possible_solution( solution, intercept ) {
    // Check if within range
    // TODO Temp. adjustment to account for baseline not square
    if((intercept >= (solution.top_range + .4)) || (intercept < (solution.bot_range + .4))) {
      return;
    }

    // Check if material is appropriate
    if((material_value() === "wood") && (solution.material !== "both")) {
      return;
    }

    // Solution must have same or next size down minimum door thickess
    if(!check_for_thickness(solution, get_thickness())) {
      return;
    }

    // Make sure at least one hinge for every 30 inches of door
    let needed = solution.hinges;
    needed = Math.max(needed, Math.ceil(get_height() / 30));

    solution_matches.push( solution_match = {model: solution.model, hinge_count: needed} );

    console.log(solution_match);
  }

  // Functions to access selection parameters, adjusted to English units.

  function get_height() {
    return convert_length_if_metric( height_value() );
  }

  function get_width() {
    return convert_length_if_metric( width_value() );
  }

  function get_thickness() {
    return thickness_value();
  }

  function get_weight() {
    let w = weight_value();
    if(units_value() === "metric") {
      w *= 2.2046;
    }
    return w;
  }

  function convert_length_if_metric( length ) {
    if(units_value() === "metric") {
      length *= 0.03937;
    }
    return length;
  }

  // Functions to pull raw values for calculation
  //   Note these are not used to get values for validation

  function height_value() {
    if(test) {
      return test_cases[test_num].height
    }
    else {
      return document.door_data.height.value;
    }
  }

  function width_value() {
    if(test) {
      return test_cases[test_num].width
    }
    else {
      return document.door_data.width.value;
    }
  }

  function thickness_value() {
    if(test) {
      return test_cases[test_num].thickness
    }
    else {
      return document.door_data.thickness.value;
    }
  }

  function weight_value() {
    if(test) {
      return test_cases[test_num].weight
    }
    else {
      return document.door_data.weight.value;
    }
  }

  function material_value() {
    if(test) {
      return test_cases[test_num].material
    }
    else {
      return document.door_data.material.value;
    }
  }

  function units_value() {
    if(test) {
      return test_cases[test_num].units
    }
    else {
      return measurement_system;
    }
  }

  // Calculate hinge solutions for input parameters
  function find_matches() {
    clear_results_display();

    let all_valid = true;
    all_valid &= validate_height();
    all_valid &= validate_width();
    all_valid &= validate_thickness();
    all_valid &= validate_weight();
    let show_table = document.querySelector('.highlight-results');
    let show_refresh = document.querySelector('.btn-refresh');
    let hide_gallery = document.querySelector('#gallery-message');
    let reset_calc_btn = document.querySelector('#reset_calc');

    // create dimmer div for this page. This appears when a result is returned
    // It disappears on page refresh.
    let wrap_container = document.querySelector('.wrap.container');
    let dimmer = document.createElement('div');
    dimmer.setAttribute('id', 'dimmer');

    wrap_container.before(dimmer);
    dimmer.classList.add('dim-page');

    clear_solution_matches();

    /* Status returns message if there any values in the form are missing
    * */

    if( !all_valid ) {
      set_status("Sorry, please provide a measurement within range to receive a hinge recommendation. Please set values for each field.");
      return;
    }

    set_status(`<?php the_field( 'success_match_status' ); ?>`);

    calculate(table);

    display_solution_matches();

    // hides gallery and shows search solutions

    show_table.classList.remove("hide");
    show_table.classList.add("show");
    show_refresh.classList.remove("hide");
    show_refresh.classList.add("show");
    hide_gallery.classList.remove('d-flex');
    hide_gallery.classList.add('hide-gallery');
  }

  function check_for_thickness( solution, specified ) {
    for(let i=0; i<min_thickness.length; i++) {
      if(min_thickness[i].eng_value === specified) {
        if(in_array(solution.model, min_thickness[i].models)) {
          return true;
        }
      }
    }
    return false;
  }

  function in_array(value, list) {
    return (list.indexOf(value) > -1);
  }

  // Test execution
  function run_tests() {
    clear_results_display();
    set_status('Results for (' + test_cases.length + ') Test Cases:');

    for(test_num = 0; test_num < test_cases.length; test_num++) {
      solution_matches = [];

      display_test_case_header();

      calculate(table);

      display_solution_matches(test_cases[test_num].matches);
    }
  }

  // Display utilities

  function display_test_case_header() {
    let row;
    let cell;

    let test_case = test_num + 1;

    row = table.insertRow();
    cell = row.insertCell();
    cell.innerHTML = "TEST CASE #" + test_case;
    cell = row.insertCell();
    cell.innerHTML = "Height: " + test_cases[test_num].height;
    cell = row.insertCell();
    cell.innerHTML = "Width: " + test_cases[test_num].width;
    cell = row.insertCell();
    cell.innerHTML = "Thickness: " + test_cases[test_num].thickness;
    cell = row.insertCell();
    cell.innerHTML = "Weight: " + test_cases[test_num].weight;
    cell = row.insertCell();
    cell.innerHTML = "Material: " + test_cases[test_num].material;
    cell = row.insertCell();
    cell.innerHTML = "Units: " + test_cases[test_num].units;
  }

  function input_changing(id) {
    element = document.getElementById(id);
    element.value = "";
    valid_input_field(element);
    clear_solution_matches();
  }

  function clear_solution_matches() {
    solution_matches = [];
    clear_results_display();
    if(test) {
      set_status("Click button to run test suite.");
    }
    else {
      set_status(`<?php the_field( 'welcome_status' ); ?>`);
    }
  }

  function refresh_page(){

    window.location.reload();
  }

  function clear_results_display() {
    table = document.getElementById("results_display");
    while(table.childNodes[0]) {
      table.removeChild(table.childNodes[0]);
    }
  }

  function display_solution_matches(matches) {
    if(solution_matches.length === 0) {
      row = table.insertRow();
      cell = row.insertCell();
      set_status(`<?php the_field( 'no_match_status' ); ?>`);
      cell.innerHTML = `
      <div class="no-match ">

      <?php the_field( 'no_match_message' );
       if ( have_rows( 'link_button' ) ) :
       while ( have_rows( 'link_button' ) ) : the_row();
         $label = get_sub_field( 'contact_us_link' );
         $url = get_sub_field( 'link_url' );
         $desc = get_sub_field( 'link_description' ); ?>
          <a type="button" href="<?= $url; ?>" title="<?= $desc ?>" class="btn btn-primary cta-brand" >
            <?php echo $label; ?>
          </a>
      <?php endwhile; ?>
      <?php endif; ?>
</div>
      `;
    }
    else
    {
      for(let i=0; i < solution_matches.length; i++) {
        row = table.insertRow();
        cell = row.insertCell();
        let msg = '';
        if( !matches ) {
          if( i === 0 ) {
            cell.className = 'recommended';
           // msg = '<b>We recommend installing</b>  ';
          }
          else {
            cell.className = 'secondary';
           // msg = ' ' + 'You may also use ';
          }
        }

        /**
         * Test if a file exists
         * @link https://www.kirupa.com/html5/checking_if_a_file_exists.htm
         */
        function doesFileExist(urlToFile) {
          var xhr = new XMLHttpRequest();
          xhr.open('HEAD', urlToFile, false);
          xhr.send();

          if (xhr.status == "404") {
            return false;
          } else {
            return true;
          }
        }



        // Customize Positive Matching Table Results

        // The link gets us close to the page, need to add more info to the match object:
        // See line 413

        /**
         * LINKED PRODUCT SOLUTION
         * Note: This solution demonstrates a method to add embedded php and text URLs within the solution routine
         * @var family_url is path to category page, would like to point to page that selects category products
         * @var product_url is path to product for quick ordering
         */

        // This value is set in the Overview Page template in a developer tab
        const model_path = "<?php the_field( 'path_to_cat_pages' ); ?>"

        const solution_value = solution_matches[i].model;
        const product_url = "<?php echo get_site_url() . '/product/model-'  ?>" + solution_value + "-invisible-hinge";
        const family_url = "<?php echo get_site_url() ?>" + model_path + "soss-" + solution_value + "-series";
        const image_url = "<?php echo get_site_url() . '/wp-content/uploads/calc/'  ?>" + solution_value + "-series-invisible-hinge.jpg";
        const dummy_url = "<?php echo get_site_url() . '/wp-content/uploads/calc/'  ?>" + "101-series-invisible-hinge.jpg";
        const learn_pitch = "";
        const number_of_hinges = solution_matches[i].hinge_count;



        let explore_btn = `<span class="big">Coming Soon</span><br>
<span class="">Product Family</span>`;
        let see_hinge_btn = `<span class="big">See Hinge</span>
<span class="">Details</span>`;

        let use_solution = "";

        // if image URL is not a valid string, pass the dummy value
        // the dummy is set to 101 product. TODO: add a method for customer to add their own placeholder

        const file_exists = doesFileExist(image_url);

        if (file_exists == true) {
           use_url = image_url;
        } else {
           use_url = dummy_url;
        }

        // Results information based on search printed to screen

        cell.innerHTML = `



<div class="form-results">
<div class="results-image">
<img src="${use_url}" alt="See our ${solution_value} model Invisible Hinge Series">
</div>

<div class="results-info">
 We recommend <strong>${number_of_hinges}</strong> of the ${solution_value} Invisible Hinge.
  <span class='description'>${learn_pitch} </span>
</div>
<div class="family cta-disabled btn" title="Coming Soon: See finishes, forms and variations!" ><div class="">
       ${explore_btn}
</div></div>


<a href="${product_url}" class=" product cta-brand btn" title="Request a referral for this ${solution_value} model now!" >
       ${see_hinge_btn}
</a>
</div>
`
        /**
         * <a href="${family_url}" class="family cta-brand" title="See finishes, forms and variations!" >
         ${explore_btn}
         </a>
         */

        if( matches && !solution_present(solution_matches[i], matches)) {
          cell = row.insertCell();
          cell.innerHTML = "- found.";
          row.style.color = "red";
        }
      }
    }

    if(matches) {
      for(let i=0; i<matches.length; i++) {
        if( !solution_present(matches[i], solution_matches)) {
          row = table.insertRow();
          cell = row.insertCell();
          cell.innerHTML = "(" + matches[i].hinge_count + ") Model #" + matches[i].model + " hinges for your door.";
          cell = row.insertCell();
          cell.innerHTML = "- not found.";
          row.style.color = "red";
        }
      }
    }
  }

  function solution_present( item, list) {
    for(let i=0; i < list.length; i++) {
      if( (item.model === list[i].model) && (item.hinge_count === list[i].hinge_count)) {
        return true;
      }
    }
    return false;
  }

  function set_status(msg) {
    document.getElementById('status_msg').innerHTML = msg;
  }

  // Form utility functions

  // function initialize() {
  //   if(test) {
  //     document.door_data.style.display = "none";
  //   }
  //   else {
  //     document.getElementById("test_button").style.display = "none";
  //     measurement_system = "english";
  //     alert('initialize');
  //   }
  //   set_units();
  //   clear_input();
  // }



  var units_changed = function () {
    if(document.getElementsByName("units")[0].checked) === true {
      measurement_system = "english";
    }
    else {
      measurement_system = "metric";
    }
    clear_input();
    set_units();
  }


  function set_units() {
    if(units_value() === "english") {
      length_unit = "inches";
      weight_unit = "pounds";
    }
    else {
      length_unit = "millimeters";
      weight_unit = "kilograms";
    }

    document.getElementById('height-unit').innerHTML = length_unit;
    document.getElementById('width-unit').innerHTML = length_unit;
    document.getElementById('thickness-unit').innerHTML = length_unit;
    document.getElementById('weight-unit').innerHTML = weight_unit;

    select = document.getElementById('thickness-select');

    remove_options(select);

    for(let i=0; i<min_thickness.length; i++) {
      let option = document.createElement('option');
      option.value = min_thickness[i].eng_value;
      display = (units_value() === "english") ? min_thickness[i].eng_display : min_thickness[i].metric_display;
      option.innerHTML = display;
      select.appendChild(option);
    }
  }

  function remove_options(selectbox) {
    for(let i = selectbox.options.length - 1 ; i >= 0 ; i--) {
      selectbox.remove(i);
    }
  }

  function clear_input() {
    document.door_data.height.value = "";
    valid_input_field(document.door_data.height);
    document.door_data.width.value = "";
    valid_input_field(document.door_data.width);
    document.door_data.thickness.value = "0";
    valid_input_field(document.door_data.thickness);
    document.door_data.weight.value = "";
    valid_input_field(document.door_data.weight);
    document.getElementById('height-error').innerHTML = "";
    document.getElementById('width-error').innerHTML = "";
    document.getElementById('thickness-error').innerHTML = "";
    document.getElementById('weight-error').innerHTML = "";
    clear_solution_matches();
  }

  function invalid_input_field(element) {
    element.style.color = "red";
  }

  function valid_input_field(element) {
    element.style.color = "black";
  }

  function is_empty(str) {
    return str.replace(/^\s+|\s+$/gm,'').length === 0;
  }

</script>





<body onload="initialize();">

<div id="title_area">
  <!--   <h2>Soss Hinge Selector</h2> -->
  <!--  <h2>version 0.3.2</h2>-->
</div>

<div class="container">
  <form name="door_data">
  <div class="row">

    <div class="calc-fieldset">
      <legend>
        Soss Hinge Selection Calculator
      </legend>

      <div class="units-row">

        <div class="flex-label">
          <label for="units">Input Units: </label>
        </div>
        <div class="flex-label">
          <label>
            <input id="english_units" type="radio" name="english_units" tabindex="1" value="english" checked=""
                   onclick="units_changed();">&nbsp;English<br>
            <span class="measures legend">inches&nbsp;/ pounds</span></label>
        </div>
        <div class="flex-label">
          <label>
            <input id="metric_units" type="radio" tabindex="2" name="metric_units" value="metric"
                   onclick="units_changed();">&nbsp;Metric<br><span
              class="measures legend">millimeters&nbsp;/ kilograms</span></label>
        </div>
        <div class="flex-status">
          <div id="status_msg"></div>
        </div>


      </div>
      </div>

    </div>

    <div class="row">


    <div class="col-md-6">
      <div class="table-on-left">

        <table width="100%">

          <tr class="spaceUnder">
            <td colspan="3">
              <h4>Enter Door Information:</h4>
            </td>
          </tr>

          <tr class="d-flex align-items-center justify-content-start">
            <td width="130"><label for="height-value">Door <strong><u>H</u></strong>eight: </label></td>
            <td width="100" class="d-flex justify-content-start align-items-center">
              <input class="form-control form-control-sm" type="text" name="height" id="height-value" size="8"
                     placeholder="" accesskey="h" tabindex="3" onfocus="input_changing(this.id);"
                     onchange="validate_height();"></td>
            <td width="100" class="d-flex justify-content-start d-inline-block"><span class="measures"><span
                    id="height-unit"></span></span>
              <a class="heightBtn hotspot btn"
                   title="The height is the vertical length of the door. Using a tape measurer will ensure accuracy.">
                Help</a>
            </td>
          </tr>

          <tr>
            <td colspan="3">
              <span class="has-error "><span id="height-error" style="color: red"></span></span>
            </td>
          </tr>

          <tr class="d-flex align-items-center justify-content-start">
            <td width="130"><label for="width-value">Door <strong><u>W</u></strong>idth: </label></td>
            <td width="100" class="d-flex justify-content-start align-items-center">
              <input class="form-control form-control-sm" type="text" name="width" id="width-value" size="8"
                     placeholder="" accesskey="w" tabindex="4" onfocus="input_changing(this.id);"
                     onchange="validate_width();"></td>
            <td class="d-flex justify-content-start d-inline-block"><span class="measures"><span id="width-unit"></span></span>
              <a class="widthBtn hotspot btn" title="The width is the distance from edge to edge. Use a tape measurer to get the distance across the top or bottom edges.">Help</a>
            </td>
          </tr>

          <tr>
            <td colspan="3">
              <span id="width-error" style="color: red"></span>
            </td>
          </tr>

          <tr class="d-flex align-items-center justify-content-start">
            <td width="130"><label for="thickness-select">Door <strong><u>T</u></strong>hickness: </label></td>
            <td width="100" class="d-flex justify-content-start align-items-center">
              <select class="form-control form-control-sm" id="thickness-select" name="thickness" accesskey="t"
                      tabindex="5" onfocus="input_changing(this.id);" onchange="validate_thickness();"></select></td>
            <td class="d-flex justify-content-start d-inline-block"><span class="measures"><span
                    id="thickness-unit"></span></span>
              <a class="thickBtn hotspot btn" title="For door thickness, measure the actual door thickness and select the largest thickness option that is not greater than the measured door thickness. Actual door thickness is often less than the thickness provided on the door specification.">
                Help</a>
            </td>
          </tr>

          <tr>
            <td colspan="3">
              <span id="thickness-error" style="color: red"></span>
            </td>
          </tr>

          <tr class="d-flex align-items-center justify-content-start">
            <td width="130"><label for="weight-value">Door W<strong><u>e</u></strong>ight: </label></td>
            <td width="100" class="">
              <input class="form-control form-control-sm" type="text" name="weight" id="weight-value" size="8"
                     placeholder="" accesskey="e" onfocus="input_changing(this.id);" tabindex="6"
                     onchange="validate_weight();"></td>
            <td width="100" class="d-flex justify-content-start d-inline-block"><span class="measures"><span
                    id="weight-unit"></span></span>
              <a class="weightBtn hotspot btn" title="Often a bathroom scales is the perfect tool to capture your door weight.">
                Help</a>
            </td>
          </tr>

          <tr>
            <td colspan="3">
              <span id="weight-error" style="color: red"></span>
            </td>
          </tr>

          <tr class="d-flex align-items-center justify-content-start">
            <td width="130"><label for="material">Door <strong><u>M</u></strong>aterial: </label></td>
            <td width="100" class="d-flex justify-content-start align-items-center">
              <select class="form-control form-control-sm" id="material" name="material"
                      onchange="clear_solution_matches();" tabindex="7" accesskey="m">
                <option value="wood" selected="selected">Wood</option>
                <option value="metal">Metal</option>
              </select>
            </td>
            <td width="100" class="">
              <!--  empty  -->
            </td>
          </tr>

        </table>
        <button class="btn-primary cta-brand cta-submit" type="button" onclick="find_matches();" tabindex="8" accesskey="c"
                style="margin:1rem 0 4rem;"><strong><u>C</u></strong>alculate
        </button>

      </div> <!-- /end 12 col -->

    </div> <!-- /end 6 col left side -->



    <div class="col-md-6">

      <div id="gallery-message" class="gallery-message w-100 h-100 text-center d-flex justify-content-center align-items-center">
        <div class="help-message">
          Hover over ( or click ) <span class="look-like-btn">Help</span> for Selection Assistance
        </div>
      </div>

      <!--    Begin Gallery    -->

      <div class="svg-gallery "> <!-- SVG GALLERY BEGIN -->

      <?php
     //   get_template_part( 'soss-calc-svg-gallery' );
    include( 'soss-calc-svg-gallery.php' ); ?>
      </div>  <!-- /END Svg Gallery -->


      <div class="highlight-results hide ">

        <table id="results_display" width="100%"></table>

        <button class="btn  btn-refresh hide" type="button"
                onClick="refresh_page()"><i class="fa fa-refresh fa-spin-hover"></i>&nbsp;Try Again!</button>

      </div>

    </div><!-- /end col-md-6 right side  -->



  </div><!-- /end  row -->
  <div class="row">
    <div class="col-sm-12">

        <button type="button" id="test_button" onclick="run_tests();" style="margin:1rem 0;">Run Tests</button>

    </div>
  </div> <!-- /end row containing run_tests() -->
  </form>
</div> <!-- /end container -->

</body>

