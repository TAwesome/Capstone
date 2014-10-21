@extends('layouts.master')

@section('header')
<title>MyLanguage</title>
@stop


@section('content')
  <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron" style="padding-bottom: 160px;">
          <h1>Welcome!</h1>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <p><a href="#" id="about"class="btn btn-primary btn-lg" role="button">About us &raquo;</a></p>
        </div>

      <!-- *****Sign up***** -->
      <div id="container">
        <div class="sign-up">
          <!-- Basic Input Sign in stuff -->
          <h2 style="width: 300px">Sign up!</h2>

          <form method="POST" action="{{ action('UsersController@store') }}" class="form-horizontal" role="form">

            <p>
              <div class="form-group" id="fnln">
                <div class="col-sm-offset-2 col-sm-8" style="margin-left: 100px;">
                  <label class="sr-only" for="exampleInputFirstName2">First Name</label>
                  <input type="text" class="form-control" id="exampleInputFirstName2" name="first_name" placeholder="First Name">
                </div>
              </div>

              <div class="form-group" id="fnln">
                <div class="col-sm-offset-2 col-sm-8" style="margin-left: 100px;">
                  <label class="sr-only" for="exampleInputLast Name2">LastName</label>
                  <input type="text" class="form-control" id="exampleInputLastName2" name="last_name" placeholder="Last Name">
                </div>
              </div>
            </p>
            
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8" style="margin-left: 100px;">
                <label class="sr-only" for="exampleInputEmail2">Email</label>
                <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8" style="margin-left: 100px;">
                <label class="sr-only" for="exampleInputPassword2">Password</label>
                <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
              </div>
            </div>

            <br>

            <!-- *****Birthday Dropdown***** -->
            <div class="dropdown">
              <h4 style="width: 265px">Birthday</h4>
                <div class="col-md-2" style="padding-left: 0px; width: 101px; padding-right: 0px; margin-left: 100px;">
                  <select class="form-control" id="bday-year" name="b_year">
                      <option selected>Year</option>
                      <option>2010</option>
                      <option>2009</option>
                      <option>2008</option>
                      <option>2007</option>
                      <option>2006</option>
                      <option>2005</option>
                      <option>2004</option>
                      <option>2003</option>
                      <option>2002</option>
                      <option>2001</option>
                      <option>2000</option>
                      <option>1999</option>
                      <option>1998</option>
                      <option>1997</option>
                      <option>1996</option>
                      <option>1995</option>
                      <option>1994</option>
                      <option>1993</option>
                      <option>1992</option>
                      <option>1991</option>
                      <option>1990</option>
                      <option>1989</option>
                      <option>1988</option>
                      <option>1987</option>
                      <option>1986</option>
                      <option>1985</option>
                      <option>1984</option>
                      <option>1983</option>
                      <option>1982</option>
                      <option>1981</option>
                      <option>1980</option>
                      <option>1979</option>
                      <option>1978</option>
                      <option>1977</option>
                      <option>1976</option>
                      <option>1975</option>
                      <option>1974</option>
                      <option>1973</option>
                      <option>1972</option>
                      <option>1971</option>
                      <option>1970</option>
                      <option>1969</option>
                      <option>1968</option>
                      <option>1967</option>
                      <option>1966</option>
                      <option>1965</option>
                      <option>1964</option>
                      <option>1963</option>
                      <option>1962</option>
                      <option>1961</option>
                      <option>1960</option>
                      <option>1959</option>
                      <option>1958</option>
                      <option>1957</option>
                      <option>1956</option>
                      <option>1955</option>
                      <option>1954</option>
                      <option>1953</option>
                      <option>1952</option>
                      <option>1951</option>
                      <option>1950</option>
                  </select>
                </div>

                <div class="col-md-2" style="padding-left: 0px; width: 101px; padding-right: 0px; margin-left: 10px;">
                  <select class="form-control" id="bday-month" name="b_month">
                      <option selected>Month</option>
                      <option>01</option>
                      <option>02</option>
                      <option>03</option>
                      <option>04</option>
                      <option>05</option>
                      <option>06</option>
                      <option>07</option>
                      <option>08</option>
                      <option>09</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                  </select>
                </div>

                <div class="col-md-2" style="padding-left: 0px; width: 101px; padding-right: 0px; margin-left: 10px;">
                  <select class="form-control" id="bday-day" name="b_date">
                      <option selected>Day</option>
                      <option>01</option>
                      <option>02</option>
                      <option>03</option>
                      <option>04</option>
                      <option>05</option>
                      <option>06</option>
                      <option>07</option>
                      <option>08</option>
                      <option>09</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>16</option>
                      <option>15</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>
                      <option>21</option>
                      <option>22</option>
                      <option>23</option>
                      <option>24</option>
                      <option>25</option>
                      <option>26</option>
                      <option>27</option>
                      <option>28</option>
                      <option>29</option>
                      <option>30</option>
                      <option>31</option>
                  </select>
                </div>
            </div>

            <br>
            <br>
            <br>

            <!-- *****Gender Selection***** -->
            <div class="radio">
              <h4>Gender</h4>
                <div id="radio">
                  <label class="radio-inline">
                    <input type="radio" name="gender" id="inlineRadio1" value="F"> Female
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="gender" id="inlineRadio2" value="M"> Male
                  </label>
                </div>
            </div>

            <br>


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-6" style="margin-left: 35px;">
                <label class="sr-only" for="exampleInputSignUp2">Sign Up</label>
                <button type="submit" class="btn btn-lg btn-success">Sign Up</button>
              </div>
            </div>
          </form>

        </div>
      </div>

@stop



@section('bottom-script')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
@stop
