<template>
  <div>
    <div class="clock">
      <div class="text-center">
        <div>
          <span id="clockHour" class="h1 hour">{{ this.Hour }}</span>
          <span class="animate__animated animate__fadeIn animate__infinite"
            >:</span
          >
          <span id="clockMinutes" class="h3 munite">{{ this.Minute }}</span>
          <span class="animate__animated animate__fadeIn animate__infinite"
            >:</span
          >
          <span
            class="
              h4
              animate__animated
              animate__fadeIn
              animate__infinite
              animate__delay-0.5s
            "
            >{{ this.Second }}</span
          >
          <span class="h6">{{ this.Meridian }}</span>
        </div>
        <div class="text-muted">
          <span id="calendarDay" class="">{{ this.Day }}</span>
          <br />
          <span>{{ this.Month }}</span>
          <span>{{ this.Date }}</span
          >,
          <span>{{ this.Year }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Year: "",
      Month: "",
      Date: "",
      Day: "",
      Hour: "",
      Minute: "",
      Second: "",
      Meridian: "",

      days: [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ],
      months: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ],
    };
  },
  created() {
    this.getClockData();
    setInterval(this.getClockData, 100);
  },
  methods: {
    getClockData() {
      let now = new Date();
      this.Year = now.getFullYear();
      this.Month = this.months[now.getMonth()];
      this.Date = now.getDate();
      this.Day = this.days[now.getDay()];
      //
      //
      let hour = now.getHours();
      let minutes = now.getMinutes();
      let seconds = now.getSeconds();
      this.Meridian = hour < 12 ? "AM" : "PM";
      this.Hour = hour > 12 ? hour - 12 : hour;
      if (hour === 0) {
        this.Hour = 12;
      }
      this.Minute = minutes < 10 ? "0" + minutes : minutes;
      this.Second = seconds < 10 ? "0" + seconds : seconds;
    },
  },
};
</script>

<style lang="stylus" scoped></style>
